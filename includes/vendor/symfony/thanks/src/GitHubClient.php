<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Thanks;

use Composer\Composer;
use Composer\Downloader\TransportException;
use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Json\JsonFile;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PreFileDownloadEvent;
use Composer\Util\HttpDownloader;
use Composer\Util\RemoteFilesystem;
use Hirak\Prestissimo\CurlRemoteFilesystem;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class GitHubClient
{
    // This is a list of projects that should get a star on their main repository
    // (when there is one) whenever you use any of their other repositories.
    // When a project's main repo is also a dependency of their other repos (like amphp/amp),
    // there is no need to list it here, as starring will transitively happen anyway.
    private static $mainRepositories = [
        'api-platform' => [
            'name' => 'api-platform/api-platform',
            'url' => 'https://github.com/api-platform/api-platform',
        ],
        'cakephp' => [
            'name' => 'cakephp/cakephp',
            'url' => 'https://github.com/cakephp/cakephp',
        ],
        'drupal' => [
            'name' => 'drupal/drupal',
            'url' => 'https://github.com/drupal/drupal',
        ],
        'laravel' => [
            'name' => 'laravel/laravel',
            'url' => 'https://github.com/laravel/laravel',
        ],
        'illuminate' => [
            'name' => 'laravel/laravel',
            'url' => 'https://github.com/laravel/laravel',
        ],
        'nette' => [
            'name' => 'nette/nette',
            'url' => 'https://github.com/nette/nette',
        ],
        'phpDocumentor' => [
            'name' => 'phpDocumentor/phpDocumentor2',
            'url' => 'https://github.com/phpDocumentor/phpDocumentor2',
        ],
        'matomo' => [
            'name' => 'piwik/piwik',
            'url' => 'https://github.com/matomo-org/matomo',
        ],
        'reactphp' => [
            'name' => 'reactphp/react',
            'url' => 'https://github.com/reactphp/react',
        ],
        'sebastianbergmann' => [
            'name' => 'phpunit/phpunit',
            'url' => 'https://github.com/sebastianbergmann/phpunit',
        ],
        'slimphp' => [
            'name' => 'slimphp/Slim',
            'url' => 'https://github.com/slimphp/Slim',
        ],
        'Sylius' => [
            'name' => 'Sylius/Sylius',
            'url' => 'https://github.com/Sylius/Sylius',
        ],
        'symfony' => [
            'name' => 'symfony/symfony',
            'url' => 'https://github.com/symfony/symfony',
        ],
        'yiisoft' => [
            'name' => 'yiisoft/yii2',
            'url' => 'https://github.com/yiisoft/yii2',
        ],
        'zendframework' => [
            'name' => 'zendframework/zendframework',
            'url' => 'https://github.com/zendframework/zendframework',
        ],
    ];

    private $composer;
    private $io;
    private $rfs;

    public function __construct(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;

        if (class_exists(HttpDownloader::class)) {
            $this->rfs = new HttpDownloader($io, $composer->getConfig());
        } else {
            $this->rfs = Factory::createRemoteFilesystem($io, $composer->getConfig());
        }
    }

    public function getRepositories(array &$failures = null, $withFundingLinks = false)
    {
        $repo = $this->composer->getRepositoryManager()->getLocalRepository();

        $urls = [
            'composer/composer' => 'https://github.com/composer/composer',
            'php/php-src' => 'https://github.com/php/php-src',
            'symfony/thanks' => 'https://github.com/symfony/thanks',
        ];

        $directPackages = $this->getDirectlyRequiredPackageNames();
        // symfony/thanks shouldn't trigger thanking symfony/symfony
        unset($directPackages['symfony/thanks']);
        foreach ($repo->getPackages() as $package) {
            $extra = $package->getExtra();

            if (isset($extra['thanks']['name'], $extra['thanks']['url'])) {
                $urls += [$extra['thanks']['name'] => $extra['thanks']['url']];
            }

            if (!$url = $package->getSourceUrl()) {
                continue;
            }

            $urls[$package->getName()] = $url;

            if (!preg_match('#^https://github.com/([^/]++)#', $url, $url)) {
                continue;
            }
            $owner = $url[1];

            // star the main repository, but only if this package is directly
            // being required by the user's composer.json
            if (isset(self::$mainRepositories[$owner], $directPackages[$package->getName()])) {
                $urls[self::$mainRepositories[$owner]['name']] = self::$mainRepositories[$owner]['url'];
            }
        }

        ksort($urls);

        $i = 0;
        $template = $withFundingLinks
            ? '_%d: repository(owner:"%s",name:"%s"){id,viewerHasStarred,fundingLinks{platform,url}}'."\n"
            : '_%d: repository(owner:"%s",name:"%s"){id,viewerHasStarred}'."\n";
        $graphql = '';

        foreach ($urls as $package => $url) {
            if (preg_match('#^https://github.com/([^/]++)/(.*?)(?:\.git)?$#i', $url, $url)) {
                $graphql .= sprintf($template, ++$i, $url[1], $url[2]);
                $aliases['_'.$i] = [$package, sprintf('https://github.com/%s/%s', $url[1], $url[2])];
            }
        }

        $failures = [];
        $repos = [];

        foreach ($this->call(sprintf("query{\n%s}", $graphql), $failures) as $alias => $repo) {
            $repo['package'] = $aliases[$alias][0];
            $repo['url'] = $aliases[$alias][1];
            $repos[$alias] = $repo;
        }

        foreach ($failures as $alias => $messages) {
            $failures[$alias] = [
                'messages' => $messages,
                'package' => $aliases[$alias][0],
                'url' => $aliases[$alias][1],
            ];
        }

        return $repos;
    }

    public function call($graphql, array &$failures = [])
    {
        $rfs = $this->rfs;

        if ($eventDispatcher = $this->composer->getEventDispatcher()) {
            $preFileDownloadEvent = new PreFileDownloadEvent(PluginEvents::PRE_FILE_DOWNLOAD, $rfs, 'https://api.github.com/graphql');

            $eventDispatcher->dispatch($preFileDownloadEvent->getName(), $preFileDownloadEvent);

            if ($rfs instanceof RemoteFilesystem && !$preFileDownloadEvent->getRemoteFilesystem() instanceof CurlRemoteFilesystem) {
                $rfs = $preFileDownloadEvent->getRemoteFilesystem();
            }
        }

        $options = [
            'http' => [
                'method' => 'POST',
                'content' => json_encode(['query' => $graphql]),
                'header' => ['Content-Type: application/json'],
            ],
        ];

        if ($rfs instanceof HttpDownloader) {
            $result = $rfs->get('https://api.github.com/graphql', $options)->getBody();
        } else {
            $result = $rfs->getContents('github.com', 'https://api.github.com/graphql', false, $options);
        }

        $result = json_decode($result, true);

        if (isset($result['errors'][0]['message'])) {
            if (!isset($result['data'])) {
                throw new TransportException($result['errors'][0]['message']);
            }

            foreach ($result['errors'] as $error) {
                if (!isset($error['path'])) {
                    $failures[isset($error['type']) ? $error['type'] : $error['message']] = $error['message'];
                    continue;
                }

                foreach ($error['path'] as $path) {
                    $failures += [$path => $error['message']];
                    unset($result['data'][$path]);
                }
            }
        }

        return isset($result['data']) ? $result['data'] : [];
    }

    private function getDirectlyRequiredPackageNames()
    {
        $file = new JsonFile(Factory::getComposerFile(), null, $this->io);

        if (!$file->exists()) {
            throw new \Exception('Could not find your composer.json file!');
        }

        $data = $file->read() + ['require' => [], 'require-dev' => []];
        $data = array_keys($data['require'] + $data['require-dev']);

        return array_combine($data, $data);
    }
}
