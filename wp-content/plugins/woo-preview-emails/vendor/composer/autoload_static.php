<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69a1f795ae3663454f8afb3a2bac0618
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
        'Codemanas\\WooPreviewEmails\\AjaxHandler' => __DIR__ . '/../..' . '/includes/AjaxHandler.php',
        'Codemanas\\WooPreviewEmails\\Bootstrap' => __DIR__ . '/../..' . '/includes/Bootstrap.php',
        'Codemanas\\WooPreviewEmails\\Main' => __DIR__ . '/../..' . '/includes/Main.php',
        'Codemanas\\WooPreviewEmails\\UnsupportedEmails' => __DIR__ . '/../..' . '/includes/UnsupportedEmails.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit69a1f795ae3663454f8afb3a2bac0618::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69a1f795ae3663454f8afb3a2bac0618::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit69a1f795ae3663454f8afb3a2bac0618::$classMap;

        }, null, ClassLoader::class);
    }
}
