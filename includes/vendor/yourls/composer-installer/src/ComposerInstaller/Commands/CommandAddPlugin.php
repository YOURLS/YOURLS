<?php
/**
 * YOURLS Composer Installer
 */

namespace YOURLS\ComposerInstaller\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Defines the 'add-plugin' custom command
 *
 * @package   YOURLS\ComposerInstaller
 * @author    Ozh <ozh@ozh.org>
 * @link      https://github.com/yourls/composer-installer/
 * @license   MIT
 */
class CommandAddPlugin extends CommandBase
{

    /**
     * Configure the composer custom command
     */
    protected function configure()
    {
        $name = 'add-plugin';
        $desc = '<warning>Downloads</warning> a <info>YOURLS plugin</info> and add it to your <comment>`user/composer.json`</comment>';
        $def  = [ new InputArgument('plugins', InputArgument::IS_ARRAY, 'YOURLS plugin(s) to download') ];
        $help = <<<EOT
Example: <comment>`composer add-plugin ozh/example-plugin`</comment>
This command downloads plugins in the appropriate subfolder of <comment>user/plugins/</comment>, adds them to
your <comment>user/composer.json</comment> file, and updates dependencies.
Read more at https://github.com/yourls/composer-installer/

EOT;

        $this->setName($name)
             ->setDescription($desc)
             ->setDefinition($def)
             ->setHelp($help);
    }

    /**
     * Execute the composer custom command
     *
     * @param  InputInterface $input    Input interface
     * @param  OutputInterface $output  Output interface
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * First : composer require -d user joecool/super-plugin --no-update
         * This will only create/update the user/composer.json file
         */
        $require = $this->runComposerCommand(
            [
                'command' => 'require',
                'packages' => $input->getArgument('plugins'),
                '--no-update' => true,
                '--working-dir' => 'user/',
            ],
            $output
        );

        /**
         * Now : composer update
         * This will actually download newly required packages, ie the plugin
         */
        $update = $this->runComposerCommand(
            [
                'command' => 'update',
                '--no-scripts' => true,
            ],
            $output
        );

        // Both command should have returned 0
        if (($require & $update) === 0) {
            $output->writeln('Installed !');
        }
    }
}
