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
 * @package   YOURLS\ComposerInstaller\Commands\CommandRemovePlugin
 * @author    Ozh <ozh@ozh.org>
 * @link      https://github.com/yourls/composer-installer/
 * @license   MIT
 */
class CommandRemovePlugin extends CommandBase
{

    /**
     * Configure the composer custom command
     */
    protected function configure()
    {
        $name = 'remove-plugin';
        $desc = '<warning>Removes</warning> a <info>YOURLS plugin</info>';
        $def  = [ new InputArgument('plugins', InputArgument::IS_ARRAY, 'YOURLS plugin(s) to remove') ];
        $help = <<<EOT
Example: <comment>`composer remove-plugin ozh/example-plugin`</comment>
This command <warning>deletes</warning> plugins from <comment>user/plugins/</comment>, including dependencies,
and removes them from your <comment>user/composer.json</comment> file.
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
         * First : composer remove -d user joecool/super-plugin --no-update
         * This will only update the user/composer.json file
         */
        $require = $this->runComposerCommand(
            [
                'command' => 'remove',
                'packages' => $input->getArgument('plugins'),
                '--no-update' => true,
                '--working-dir' => 'user/',
            ],
            $output
        );

        /**
         * Now : composer update
         * This will actually remove stuff
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
            $output->writeln('Removed !');
        }
    }
}
