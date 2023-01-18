<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2e2c400865f10870f85d7246af120b7
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NinjaForms\\NinjaForms\\' => 22,
            'NinjaForms\\Includes\\' => 20,
            'NinjaForms\\Blocks\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NinjaForms\\NinjaForms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'NinjaForms\\Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'NinjaForms\\Blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/blocks/views/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2e2c400865f10870f85d7246af120b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2e2c400865f10870f85d7246af120b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc2e2c400865f10870f85d7246af120b7::$classMap;

        }, null, ClassLoader::class);
    }
}