<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d61f4f0da117626ff6e207bedadf7aa
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WorkHours\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WorkHours\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d61f4f0da117626ff6e207bedadf7aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d61f4f0da117626ff6e207bedadf7aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d61f4f0da117626ff6e207bedadf7aa::$classMap;

        }, null, ClassLoader::class);
    }
}