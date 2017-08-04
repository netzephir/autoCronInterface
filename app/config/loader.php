<?php
$loader = new \Phalcon\Loader();
require_once $config->application->libraryDir."kintWrapper.php";

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();

