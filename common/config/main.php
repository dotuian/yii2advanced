<?php
//config 就是通用的配置，这些配置将作用于前后台和命令行。
//mail 就是应用的前后台和命令行的与邮件相关的布局文件等。
//models 就是前后台和命令行都可能用到的数据模型。

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
