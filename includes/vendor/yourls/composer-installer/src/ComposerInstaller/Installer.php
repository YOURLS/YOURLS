<?php
/**
 * YOURLS Composer Installer
 */

namespace YOURLS\ComposerInstaller;

use RuntimeException;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

/**
 * Extension of Composer's LibraryInstaller that allows a custom function
 * handle after update or install
 *
 * @package   YOURLS\ComposerInstaller
 * @author    Ozh <ozh@ozh.org>
 * @link      https://github.com/yourls/composer-installer/
 * @license   MIT
 */
class Installer extends LibraryInstaller
{
    /**
     * Installs specific package.
     *
     * @param InstalledRepositoryInterface $repo     repository in which to check
     * @param PackageInterface             $package  package instance
     */
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        // first install the package normally...
        parent::install($repo, $package);

        // ...then run custom code
        $this->postInstall($package);
    }

    /**
     * Updates specific package.
     *
     * @param InstalledRepositoryInterface $repo     repository in which to check
     * @param PackageInterface             $initial  already installed package version
     * @param PackageInterface             $target   updated version
     *
     * @throws InvalidArgumentException if $initial package is not installed
     */
    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        // first update the package normally...
        parent::update($repo, $initial, $target);

        // ...then run custom code
        $this->postInstall($target);
    }

    /**
     * Custom handler called after each package installation or update
     *
     * @param PackageInterface $package
     */
    protected function postInstall(PackageInterface $package)
    {
        // remove the package's `vendor` directory to avoid duplicated autoloader and vendor code
        $packageVendorDir = $this->getInstallPath($package) . '/vendor';
        if (is_dir($packageVendorDir)) {
            $success = $this->filesystem->removeDirectory($packageVendorDir);
            if (!$success) {
                throw new RuntimeException('Could not completely delete ' . $path . ', aborting.'); // @codeCoverageIgnore
            }
        }
    }
}
