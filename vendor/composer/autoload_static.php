<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaa1e21a328bde12f49566411a360906e
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'SMS_Interface' => __DIR__ . '/../..' . '/Model/SMS_interface.php',
        'Weather' => __DIR__ . '/../..' . '/Model/Weather.php',
        'Weather_Interface' => __DIR__ . '/../..' . '/Model/Weather_Interface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitaa1e21a328bde12f49566411a360906e::$classMap;

        }, null, ClassLoader::class);
    }
}
