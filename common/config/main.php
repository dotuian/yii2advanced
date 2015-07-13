<?php
//config 就是通用的配置，这些配置将作用于前后台和命令行。
//mail 就是应用的前后台和命令行的与邮件相关的布局文件等。
//models 就是前后台和命令行都可能用到的数据模型。

$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        /**
         * 美化URL，需要apache添加rewrite和headers的模块
         * sudo a2enmod rewrite
         * sudo a2enmod headers
         * sudo /etc/init.d/apache2 restart
         * 
         * 然后在配置文件中添加如下配置信息
            <Directory /var/www/html/yii2advanced/frontend/web >
                    Options FollowSymLinks MultiViews
                    AllowOverride All
                    Order allow,deny
                    allow from all

                    RewriteEngine on
                    # if a directory or a file exists, use it directly
                    RewriteCond %{REQUEST_FILENAME} !-f
                    RewriteCond %{REQUEST_FILENAME} !-d
                    # Otherwise forward the request to index.php
                    RewriteRule . index.php [L]
                    Header always append X-Frame-Options SAMEORIGIN
            </Directory>

         * 
         * 
         * 在Yii配置文件中添加 urlManager 组件的配置信息
         * 
        */
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // 是否开启URL美化功能。如果 $enablePrettyUrl 不开启，表明使用原始的格式，那么所有路由规则都是无效的。
            'enablePrettyUrl' => true,
            // 是否在URL中显示入口脚本。
            'showScriptName' => false,
            // 是否开启严格解析。该选项仅在开启美化功能后生效。
            // 在开启严格解析模式时， 所有请求必须匹配 $rules[] 所声明的至少一个路由规则。
            // 如果未开启，请求的PATH_INFO部分将作为所请求的路由进行后续处理。
            'enableStrictParsing' => false,
            
            // 设置一个 .html 之类的假后缀
            'suffix' => '.html',
            // 保存路由规则们的声明
            'rules' => [
                // 使用 yii\web\UrlRule 来表示路由规则
                'class' => 'yii\web\UrlRule',
                
                // 为路由指定了一个别名，以 post 的复数形式来表示 post/index 路由
                'posts' => 'post/index',

                // id 是命名参数，post/100 形式的URL，其实是 post/view&id=100
                'post/<id:\d+>' => 'post/view',

                // controller action 和 id 以命名参数形式出现
                '<controller:(post|comment)>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',

                // 包含了 HTTP 方法限定，仅限于DELETE方法
                'DELETE <controller:\w+>/<id:\d+>' => '<controller>/delete',

                // 需要将 Web Server 配置成可以接收 *.digpage.com 域名的请求
                'http://<user:\w+>.digpage.com/<lang:\w+>/profile' => 'user/profile',
            ]
        ],
        
        
        
        /**
         * 数据库用户的创建，并赋予权限
         * DROP USER 'shou'@'localhost'; 
         * CREATE USER 'shou'@'localhost' IDENTIFIED BY 'shouadmin'; 
         * GRANT CREATE,DELETE,INSERT,SELECT,UPDATE,DROP ON yii2test.* TO 'shou'@'localhost'; 
         * FLUSH PRIVILEGES; 
         */
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2test',
            'username' => 'shou',
            'password' => 'shouadmin',
            'charset' => 'utf8',
        ],
        
        
        
        
        
        
        
        
    ],
];

// 调试信息，gii模块
if (!YII_ENV_PROD) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            'allowedIPs' => ['192.168.0.80', '127.0.0.1', '::1'],
            'panels' => [
                //'views' => ['class' => 'app\components\ViewsPanel'],
            ],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'] // adjust this to your needs
    ];
}


return $config;
