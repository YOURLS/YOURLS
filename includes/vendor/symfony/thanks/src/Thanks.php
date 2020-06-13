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
use Composer\Console\Application;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event as ScriptEvent;
use Composer\Script\ScriptEvents;
use Symfony\Component\Console\Input\ArgvInput;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Thanks implements EventSubscriberInterface, PluginInterface
{
    private $io;
    private $displayReminder = 0;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->io = $io;

        foreach (debug_backtrace() as $trace) {
            if (!isset($trace['object']) || !isset($trace['args'][0])) {
                continue;
            }

            if (!$trace['object'] instanceof Application || !$trace['args'][0] instanceof ArgvInput) {
                continue;
            }

            $input = $trace['args'][0];
            $app = $trace['object'];

            try {
                $command = $input->getFirstArgument();
                $command = $command ? $app->find($command)->getName() : null;
            } catch (\InvalidArgumentException $e) {
            }

            if ('update' === $command) {
                $this->displayReminder = 1;
            }

            $app->add(new Command\ThanksCommand());

            if (!$app->has('fund')) {
                $app->add(new Command\FundCommand());
            }

            break;
        }
    }

    public function enableReminder()
    {
        if (1 === $this->displayReminder) {
            $this->displayReminder = version_compare('1.1.0', PluginInterface::PLUGIN_API_VERSION, '<=') ? 2 : 0;
        }
    }

    public function displayReminder(ScriptEvent $event)
    {
        if (2 !== $this->displayReminder) {
            return;
        }

        $gitHub = new GitHubClient($event->getComposer(), $event->getIO());

        $notStarred = 0;
        foreach ($gitHub->getRepositories() as $repo) {
            $notStarred += (int) !$repo['viewerHasStarred'];
        }

        if (!$notStarred) {
            return;
        }

        $love = '💖 ';
        $star = '★ ';
        $cash = '💵 ';

        if ('Hyper' === getenv('TERM_PROGRAM')) {
            $star = '⭐ ';
        } elseif ('\\' === \DIRECTORY_SEPARATOR) {
            $love = 'love';
            $star = 'star';
            $cash = 'cash.';
        }

        $this->io->writeError('');
        $this->io->writeError('What about running <comment>composer thanks</> now?</>');
        $this->io->writeError(sprintf('This will spread some %s by sending a %s to <comment>%d</comment> GitHub repositor%s of your fellow package maintainers.', $love, $star, $notStarred, 1 < $notStarred ? 'ies' : 'y'));
        $this->io->writeError(sprintf('You can also run <comment>composer fund</> to discover how you can sponsor their work with some %s</>', $cash));
        $this->io->writeError('');
    }

    public static function getSubscribedEvents()
    {
        return [
            PackageEvents::POST_PACKAGE_UPDATE => 'enableReminder',
            ScriptEvents::POST_UPDATE_CMD => 'displayReminder',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function uninstall(Composer $composer, IOInterface $io)
    {
    }
}
