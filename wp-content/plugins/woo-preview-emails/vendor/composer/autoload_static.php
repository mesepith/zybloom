<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10cb1abd09361fc53e330d040d3c768d
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Codemanas\\WooPreviewEmails\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Codemanas\\WooPreviewEmails\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Codemanas\\WooPreviewEmails\\Bootstrap' => __DIR__ . '/../..' . '/includes/Bootstrap.php',
        'Codemanas\\WooPreviewEmails\\Main' => __DIR__ . '/../..' . '/includes/Main.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10cb1abd09361fc53e330d040d3c768d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10cb1abd09361fc53e330d040d3c768d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit10cb1abd09361fc53e330d040d3c768d::$classMap;

        }, null, ClassLoader::class);
    }
}
