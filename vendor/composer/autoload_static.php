<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60d0b9f1d25627bd7653167766701765
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60d0b9f1d25627bd7653167766701765::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60d0b9f1d25627bd7653167766701765::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit60d0b9f1d25627bd7653167766701765::$classMap;

        }, null, ClassLoader::class);
    }
}
