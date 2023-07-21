<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite74fc6054f64de841c142dbcc5dd7e54
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NFMailchimp\\NinjaForms\\Mailchimp\\' => 33,
            'NFMailchimp\\EmailCRM\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NFMailchimp\\NinjaForms\\Mailchimp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'NFMailchimp\\EmailCRM\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite74fc6054f64de841c142dbcc5dd7e54::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite74fc6054f64de841c142dbcc5dd7e54::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite74fc6054f64de841c142dbcc5dd7e54::$classMap;

        }, null, ClassLoader::class);
    }
}
