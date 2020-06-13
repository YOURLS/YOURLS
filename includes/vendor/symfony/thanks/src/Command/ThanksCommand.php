<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Thanks\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Thanks\GitHubClient;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ThanksCommand extends BaseCommand
{
    private $star = '★ ';
    private $love = '💖 ';
    private $cash = '💵 ';

    protected function configure()
    {
        if ('Hyper' === getenv('TERM_PROGRAM')) {
            $this->star = '⭐ ';
        } elseif ('\\' === \DIRECTORY_SEPARATOR) {
            $this->star = '*';
            $this->love = '<3';
            $this->cash = '$$$';
        }

        $this->setName('thanks')
            ->setDescription(sprintf('Give thanks (in the form of a GitHub %s) to your fellow PHP package maintainers.', $this->star))
            ->setDefinition([
                new InputOption('dry-run', null, InputOption::VALUE_NONE, 'Don\'t actually send the stars'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $composer = $this->getComposer();
        $gitHub = new GitHubClient($composer, $this->getIO());

        $repos = $gitHub->getRepositories($failures);

        $template = '%1$s: addStar(input:{clientMutationId:"%s",starrableId:"%s"}){clientMutationId}'."\n";
        $graphql = '';
        $notStarred = [];

        foreach ($repos as $alias => $repo) {
            if (!$repo['viewerHasStarred']) {
                $graphql .= sprintf($template, $alias, $repo['id']);
                $notStarred[$alias] = $repo;
            }
        }

        if (!$notStarred) {
            $output->writeln('You already starred all your GitHub dependencies.');
        } else {
            if (!$input->getOption('dry-run')) {
                $notStarred = $gitHub->call(sprintf("mutation{\n%s}", $graphql));
            }

            $output->writeln('Stars <comment>sent</> to:');
            foreach ($repos as $alias => $repo) {
                $output->writeln(sprintf(' %s %s - %s', $this->star, sprintf(isset($notStarred[$alias]) ? '<comment>%s</>' : '%s', $repo['package']), $repo['url']));
            }
        }

        if ($failures) {
            $output->writeln('');
            $output->writeln('Some repositories could not be starred, please run <info>composer update</info> and try again:');

            foreach ($failures as $alias => $failure) {
                foreach ((array) $failure['messages'] as $message) {
                    $output->writeln(sprintf(' * %s - %s', $failure['url'], $message));
                }
            }
        }

        $output->writeln("\nPlease consider contributing back in any way if you can!");
        $output->writeln(sprintf("\nRun <comment>composer fund</> to discover how you can sponsor your fellow PHP package maintainers %s", $this->cash));
        $output->writeln(sprintf("\nThank you! %s", $this->love));

        return 0;
    }
}
