<?php

spl_autoload_register(function ($class) {


    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/';

    // get the relative class name
    $relative_class = $class;

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        /** @noinspection PhpIncludeInspection */
        require $file;
    }
});
