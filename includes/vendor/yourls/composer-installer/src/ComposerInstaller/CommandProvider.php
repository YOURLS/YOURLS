<?php
/**
 * YOURLS Composer Installer
 */

namespace YOURLS\ComposerInstaller;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;

/**
 * List all custom commands
 *
 * @package   YOURLS\ComposerInstaller
 * @author    Ozh <ozh@ozh.org>
 * @link      https://github.com/yourls/composer-installer/
 * @license   MIT
 */
class CommandProvider implements CommandProviderCapability
{
    /**
     * Register custom composer commands
     */
    public function getCommands()
    {
        return [
            new Commands\CommandAddPlugin(),
            new Commands\CommandRemovePlugin(),
        ];
    }
}
