<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbec69eb77df54c1451a1330aa021faa6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbec69eb77df54c1451a1330aa021faa6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbec69eb77df54c1451a1330aa021faa6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbec69eb77df54c1451a1330aa021faa6::$classMap;

        }, null, ClassLoader::class);
    }
}