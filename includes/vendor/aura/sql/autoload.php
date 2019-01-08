<?php
spl_autoload_register(function ($class) {

    // the package namespace
    $ns = 'Aura\Sql';

    // what prefixes should be recognized?
    $prefixes = array(
        "{$ns}\\" => array(
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ),
    );

    // go through the prefixes
    foreach ($prefixes as $prefix => $dirs) {

        // does the requested class match the namespace prefix?
        $prefix_len = strlen($prefix);
        if (substr($class, 0, $prefix_len) !== $prefix) {
            continue;
        }

        // strip the prefix off the class
        $class = substr($class, $prefix_len);

        // a partial filename
        $part = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        // go through the directories to find classes
        foreach ($dirs as $dir) {
            $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
            $file = $dir . DIRECTORY_SEPARATOR . $part;
            if (is_readable($file)) {
                require $file;
                return;
            }
        }
    }

});
