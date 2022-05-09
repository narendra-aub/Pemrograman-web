<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit368762ae8411a9fd70adc26f1fe64e05
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'User\\UtsPraktek\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'User\\UtsPraktek\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit368762ae8411a9fd70adc26f1fe64e05::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit368762ae8411a9fd70adc26f1fe64e05::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit368762ae8411a9fd70adc26f1fe64e05::$classMap;

        }, null, ClassLoader::class);
    }
}
