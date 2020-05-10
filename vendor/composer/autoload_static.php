<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc00a3c1fed8ff9f143489fbe0b8d49cc
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc00a3c1fed8ff9f143489fbe0b8d49cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc00a3c1fed8ff9f143489fbe0b8d49cc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
