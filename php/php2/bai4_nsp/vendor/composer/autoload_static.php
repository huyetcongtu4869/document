<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef5aa9f10db9d8625944ee1a5ecde312
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abc\\Cde\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abc\\Cde\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitef5aa9f10db9d8625944ee1a5ecde312::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef5aa9f10db9d8625944ee1a5ecde312::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitef5aa9f10db9d8625944ee1a5ecde312::$classMap;

        }, null, ClassLoader::class);
    }
}