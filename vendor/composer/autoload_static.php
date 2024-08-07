<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit11815de4a8300a29007ee265c65e0f47
{
    public static $files = array (
        'c9fbf71720c1647092ea83c773ed3879' => __DIR__ . '/../..' . '/src/Helpers/DateTimeHelper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Iproat\\Helpers\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Iproat\\Helpers\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit11815de4a8300a29007ee265c65e0f47::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit11815de4a8300a29007ee265c65e0f47::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit11815de4a8300a29007ee265c65e0f47::$classMap;

        }, null, ClassLoader::class);
    }
}
