<?php

// 预定义别名
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

Yii::setAlias('plugin', dirname(dirname(__DIR__)) . '/plugins');

/**

 与定义过程使用 Yii::setAlias() 相对应，别名的解析过程使用 Yii::getAlias()

所有预定义的别名
默认预定义别名一共有12个，其中路径别名11个，URL别名只有 @web 1个：
@yii 表示Yii框架所在的目录，也是 yii\BaseYii 类文件所在的位置；
@app 表示正在运行的应用的根目录，一般是 digpage.com/frontend ；
@vendor 表示Composer第三方库所在目录，一般是 @app/vendor 或 @app/../vendor ；
@bower 表示Bower第三方库所在目录，一般是 @vendor/bower ；
@npm 表示NPM第三方库所在目录，一般是 @vendor/npm ；
@runtime 表示正在运行的应用的运行时用于存放运行时文件的目录，一般是 @app/runtime ；
@webroot 表示正在运行的应用的入口文件 index.php 所在的目录，一般是 @app/web；
@web URL别名，表示当前应用的根URL，主要用于前端；
@common 表示通用文件夹；
@frontend 表示前台应用所在的文件夹；
@backend 表示后台应用所在的文件夹；
@console 表示命令行应用所在的文件夹；
其他使用Composer安装的Yii扩展注册的二级别名。
这样，在整个Yii应用中，只要使用上述别名，就可方便、且统一地表示特定的路径或URL。
*/



