<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef5ddce9f9f18bec345fcee5303edfe6
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'UnioBank\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'UnioBank\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef5ddce9f9f18bec345fcee5303edfe6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef5ddce9f9f18bec345fcee5303edfe6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
