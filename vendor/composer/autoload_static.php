<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit038047d578de97b3e064604698080b83
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CasautoSellerListing\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CasautoSellerListing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit038047d578de97b3e064604698080b83::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit038047d578de97b3e064604698080b83::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit038047d578de97b3e064604698080b83::$classMap;

        }, null, ClassLoader::class);
    }
}
