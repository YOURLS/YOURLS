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
class FundCommand extends BaseCommand
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

        $this->setName('fund')
            ->setDescription(sprintf('Discover the funding links that fellow PHP package maintainers publish %s.', $this->cash))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $composer = $this->getComposer();
        $gitHub = new GitHubClient($composer, $this->getIO());

        $repos = $gitHub->getRepositories($failures, true);
        $fundings = [];
        $notStarred = 0;

        foreach ($repos as $alias => $repo) {
            $notStarred += (int) !$repo['viewerHasStarred'];

            foreach ($repo['fundingLinks'] as $link) {
                list($owner, $package) = explode('/', $repo['package'], 2);
                $fundings[$owner][$link['url']][] = $package;
            }
        }

        if ($fundings) {
            $prev = null;

            $output->writeln('The following packages were found in your dependencies and publish sponsoring links on their GitHub page:');

            foreach ($fundings as $owner => $links) {
                $output->writeln(sprintf("\n<comment>%s</comment>", $owner));
                foreach ($links as $url => $packages) {
                    $line = sprintf('  <info>%s/%s</>', $owner, implode(', ', $packages));

                    if ($prev !== $line) {
                        $output->writeln($line);
                        $prev = $line;
                    }
                    $output->writeln(sprintf('    %s %s', $this->cash, $url));
                }
            }

            $output->writeln("\nPlease consider following these links and sponsoring the work of package authors!");
            $output->writeln(sprintf("\nThank you! %s", $this->love));
        } else {
            $output->writeln("No funding links were found in your package dependencies. This doesn't mean they don't need your support!");
        }

        if ($notStarred) {
            $output->writeln(sprintf("\nRun <comment>composer thanks</> to send a %s to <comment>%d</comment> GitHub repositor%s of your fellow package maintainers.", $this->star, $notStarred, 1 < $notStarred ? 'ies' : 'y'));
        }

        return 0;
    }
}
