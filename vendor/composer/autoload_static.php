<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite89d6e399b167cb86bb4ffbc87512a67
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite89d6e399b167cb86bb4ffbc87512a67::$classMap;

        }, null, ClassLoader::class);
    }
}
