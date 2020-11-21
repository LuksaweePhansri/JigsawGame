<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58ad84cf3e0dccfd0176e423bded33a7
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'luksaweep\\hw4\\' => 14,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'luksaweep\\hw4\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit58ad84cf3e0dccfd0176e423bded33a7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58ad84cf3e0dccfd0176e423bded33a7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
