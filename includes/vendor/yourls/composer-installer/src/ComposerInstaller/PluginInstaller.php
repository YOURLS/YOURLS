<?php

namespace YOURLS\ComposerInstaller;

use Composer\Package\PackageInterface;

/**
 * YOURLS Composer Installer
 * 
 * @package   YOURLS\ComposerInstaller\PluginInstaller
 * @author    Ozh <ozh@ozh.org>
 * @link      https://github.com/yourls/composer-installer/
 * @license   MIT
 */
class PluginInstaller extends Installer
{
    /**
     * Decides if this installer supports the given package type
     *
     * @param  string  $packageType
     * @return bool    true if type is 'yourls-plugin', false otherwise
     */
    public function supports($packageType): bool
    {
        return $packageType === 'yourls-plugin';
    }
    
    /**
     * Returns the installation path of a package
     *
     * @param  PackageInterface $package  Package
     * @return string                     path
     */
    public function getInstallPath(PackageInterface $package): string
    {
        // Put package in 'vendor/' directory as usual if PluginInstaller is not required
        if ($this->requiresPluginInstaller($package) !== true) {
            return $this->fixWinPath(parent::getInstallPath($package));
        }

        // get the extra configuration of the top-level package
        if ($rootPackage = $this->composer->getPackage()) {
            $extra = $rootPackage->getExtra();
        } else {
            $extra = [];
        }

        // use base path from configuration if specified, otherwise use YOURLS default
        $basePath = $extra['yourls-plugin-path'] ?? 'user/plugins';

        // Get plugin name from its package name 
        $prettyName = $package->getPrettyName();
        $pluginExtra = $package->getExtra();
        
        if (strpos($prettyName, '/') !== false) {
            // use name after the slash
            $name = explode('/', $prettyName)[1];
        } else {
            // case when a package is just 'name', not 'vendor/name' (can this happen?)
            $name = $prettyName;
        }

        // build destination path from base path and plugin name
        return $this->fixWinPath($basePath . '/' . $name);
    }

    /**
     * Custom handler that will be called after package install or update
     *
     * @param PackageInterface $package  Package
     */
    protected function postInstall(PackageInterface $package)
    {
        // only continue if PluginInstaller is supported
        if ($this->requiresPluginInstaller($package) !== true) {
            return;
        }

        parent::postInstall($package);
    }

    /**
     * Checks if the package has explicitly required this installer
     * 
     * If not (package is not a YOURLS plugin, or plugin does not support this installer yet)
     * the installer will fall back to the behavior of the LibraryInstaller
     *
     * @param  PackageInterface $package
     * @return bool
     */
    protected function requiresPluginInstaller(PackageInterface $package): bool
    {
        foreach ($package->getRequires() as $link) {
            if ($link->getTarget() === 'yourls/composer-installer') {
                return true;
            }
        }

        // no required package is the installer
        return false;
    }
    
    /**
     * Fix path in Windows 
     * 
     * @param  string $path  Path
     * @return string
     */
    protected function fixWinPath(string $path): string
    {
        return str_replace('\\', '/', $path);
    }
    
}
