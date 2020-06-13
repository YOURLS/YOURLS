<?php
/**
 * This file is part of the Composer Merge plugin.
 *
 * Copyright (C) 2015 Bryan Davis, Wikimedia Foundation, and contributors
 *
 * This software may be modified and distributed under the terms of the MIT
 * license. See the LICENSE file for details.
 */

namespace Wikimedia\Composer\Merge;

use Composer\Composer;

/**
 * Mutable plugin state
 *
 * @author Bryan Davis <bd808@bd808.com>
 */
class PluginState
{
    /**
     * @var Composer $composer
     */
    protected $composer;

    /**
     * @var array $includes
     */
    protected $includes = array();

    /**
     * @var array $requires
     */
    protected $requires = array();

    /**
     * @var array $duplicateLinks
     */
    protected $duplicateLinks = array();

    /**
     * @var bool $devMode
     */
    protected $devMode = false;

    /**
     * @var bool $recurse
     */
    protected $recurse = true;

    /**
     * @var bool $replace
     */
    protected $replace = false;

    /**
     * @var bool $ignore
     */
    protected $ignore = false;

    /**
     * Whether to merge the -dev sections.
     * @var bool $mergeDev
     */
    protected $mergeDev = true;

    /**
     * Whether to merge the extra section.
     *
     * By default, the extra section is not merged and there will be many
     * cases where the merge of the extra section is performed too late
     * to be of use to other plugins. When enabled, merging uses one of
     * two strategies - either 'first wins' or 'last wins'. When enabled,
     * 'first wins' is the default behaviour. If Replace mode is activated
     * then 'last wins' is used.
     *
     * @var bool $mergeExtra
     */
    protected $mergeExtra = false;

    /**
     * Whether to merge the extra section in a deep / recursive way.
     *
     * By default the extra section is merged with array_merge() and duplicate
     * keys are ignored. When enabled this allows to merge the arrays recursively
     * using the following rule: Integer keys are merged, while array values are
     * replaced where the later values overwrite the former.
     *
     * This is useful especially for the extra section when plugins use larger
     * structures like a 'patches' key with the packages as sub-keys and the
     * patches as values.
     *
     * When 'replace' mode is activated the order of array merges is exchanged.
     *
     * @var bool $mergeExtraDeep
     */
    protected $mergeExtraDeep = false;

    /**
     * Whether to merge the scripts section.
     *
     * @var bool $mergeScripts
     */
    protected $mergeScripts = false;

    /**
     * @var bool $firstInstall
     */
    protected $firstInstall = false;

    /**
     * @var bool $locked
     */
    protected $locked = false;

    /**
     * @var bool $dumpAutoloader
     */
    protected $dumpAutoloader = false;

    /**
     * @var bool $optimizeAutoloader
     */
    protected $optimizeAutoloader = false;

    /**
     * @param Composer $composer
     */
    public function __construct(Composer $composer)
    {
        $this->composer = $composer;
    }

    /**
     * Load plugin settings
     */
    public function loadSettings()
    {
        $extra = $this->composer->getPackage()->getExtra();
        $config = array_merge(
            array(
                'include' => array(),
                'require' => array(),
                'recurse' => true,
                'replace' => false,
                'ignore-duplicates' => false,
                'merge-dev' => true,
                'merge-extra' => false,
                'merge-extra-deep' => false,
                'merge-scripts' => false,
            ),
            isset($extra['merge-plugin']) ? $extra['merge-plugin'] : array()
        );

        $this->includes = (is_array($config['include'])) ?
            $config['include'] : array($config['include']);
        $this->requires = (is_array($config['require'])) ?
            $config['require'] : array($config['require']);
        $this->recurse = (bool)$config['recurse'];
        $this->replace = (bool)$config['replace'];
        $this->ignore = (bool)$config['ignore-duplicates'];
        $this->mergeDev = (bool)$config['merge-dev'];
        $this->mergeExtra = (bool)$config['merge-extra'];
        $this->mergeExtraDeep = (bool)$config['merge-extra-deep'];
        $this->mergeScripts = (bool)$config['merge-scripts'];
    }

    /**
     * Get list of filenames and/or glob patterns to include
     *
     * @return array
     */
    public function getIncludes()
    {
        return $this->includes;
    }

    /**
     * Get list of filenames and/or glob patterns to require
     *
     * @return array
     */
    public function getRequires()
    {
        return $this->requires;
    }

    /**
     * Set the first install flag
     *
     * @param bool $flag
     */
    public function setFirstInstall($flag)
    {
        $this->firstInstall = (bool)$flag;
    }

    /**
     * Is this the first time that the plugin has been installed?
     *
     * @return bool
     */
    public function isFirstInstall()
    {
        return $this->firstInstall;
    }

    /**
     * Set the locked flag
     *
     * @param bool $flag
     */
    public function setLocked($flag)
    {
        $this->locked = (bool)$flag;
    }

    /**
     * Was a lockfile present when the plugin was installed?
     *
     * @return bool
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * Should an update be forced?
     *
     * @return true If packages are not locked
     */
    public function forceUpdate()
    {
        return !$this->locked;
    }

    /**
     * Set the devMode flag
     *
     * @param bool $flag
     */
    public function setDevMode($flag)
    {
        $this->devMode = (bool)$flag;
    }

    /**
     * Should devMode settings be processed?
     *
     * @return bool
     */
    public function isDevMode()
    {
        return $this->shouldMergeDev() && $this->devMode;
    }

    /**
     * Should devMode settings be merged?
     *
     * @return bool
     */
    public function shouldMergeDev()
    {
        return $this->mergeDev;
    }

    /**
     * Set the dumpAutoloader flag
     *
     * @param bool $flag
     */
    public function setDumpAutoloader($flag)
    {
        $this->dumpAutoloader = (bool)$flag;
    }

    /**
     * Is the autoloader file supposed to be written out?
     *
     * @return bool
     */
    public function shouldDumpAutoloader()
    {
        return $this->dumpAutoloader;
    }

    /**
     * Set the optimizeAutoloader flag
     *
     * @param bool $flag
     */
    public function setOptimizeAutoloader($flag)
    {
        $this->optimizeAutoloader = (bool)$flag;
    }

    /**
     * Should the autoloader be optimized?
     *
     * @return bool
     */
    public function shouldOptimizeAutoloader()
    {
        return $this->optimizeAutoloader;
    }

    /**
     * Add duplicate packages
     *
     * @param string $type Package type
     * @param array $packages
     */
    public function addDuplicateLinks($type, array $packages)
    {
        if (!isset($this->duplicateLinks[$type])) {
            $this->duplicateLinks[$type] = array();
        }
        $this->duplicateLinks[$type] =
            array_merge($this->duplicateLinks[$type], $packages);
    }

    /**
     * Get duplicate packages
     *
     * @param string $type Package type
     * @return array
     */
    public function getDuplicateLinks($type)
    {
        return isset($this->duplicateLinks[$type]) ?
            $this->duplicateLinks[$type] : array();
    }

    /**
     * Should includes be recursively processed?
     *
     * @return bool
     */
    public function recurseIncludes()
    {
        return $this->recurse;
    }

    /**
     * Should duplicate links be replaced in a 'last definition wins' order?
     *
     * @return bool
     */
    public function replaceDuplicateLinks()
    {
        return $this->replace;
    }

    /**
     * Should duplicate links be ignored?
     *
     * @return bool
     */
    public function ignoreDuplicateLinks()
    {
        return $this->ignore;
    }

    /**
     * Should the extra section be merged?
     *
     * By default, the extra section is not merged and there will be many
     * cases where the merge of the extra section is performed too late
     * to be of use to other plugins. When enabled, merging uses one of
     * two strategies - either 'first wins' or 'last wins'. When enabled,
     * 'first wins' is the default behaviour. If Replace mode is activated
     * then 'last wins' is used.
     *
     * @return bool
     */
    public function shouldMergeExtra()
    {
        return $this->mergeExtra;
    }

    /**
     * Should the extra section be merged deep / recursively?
     *
     * By default the extra section is merged with array_merge() and duplicate
     * keys are ignored. When enabled this allows to merge the arrays recursively
     * using the following rule: Integer keys are merged, while array values are
     * replaced where the later values overwrite the former.
     *
     * This is useful especially for the extra section when plugins use larger
     * structures like a 'patches' key with the packages as sub-keys and the
     * patches as values.
     *
     * When 'replace' mode is activated the order of array merges is exchanged.
     *
     * @return bool
     */
    public function shouldMergeExtraDeep()
    {
        return $this->mergeExtraDeep;
    }


    /**
     * Should the scripts section be merged?
     *
     * By default, the scripts section is not merged.
     *
     * @return bool
     */
    public function shouldMergeScripts()
    {
        return $this->mergeScripts;
    }
}
// vim:sw=4:ts=4:sts=4:et:
