<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<style type="text/css">
/*
  Globals
*/

body {
	margin: 0;
	background: #556270;
	color: #353d46;
}

h1, h2, h3 { color: #FF6B6B; margin: 0 0 27px; }

/*
  Menu
*/
nav#slide-menu {
	position: fixed;
	top: 60px;
	bottom: 0;
	display: block;
	float: left;
	width: 100%;
	max-width: 200px;
	height: 100%;

	-moz-transition: all 300ms;
	-webkit-transition: all 300ms;
	transition: all 300ms;
}

body.menu-active nav#slide-menu { left: 0px; }
body.menu-active nav#slide-menu ul { left: 0px; opacity: 1; }

/*
  Content
*/
div#content {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	padding: 60px;
	overflow: scroll;
	background: #fcfeff;
	border-radius: 0;

	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;

	-moz-box-shadow: -3px 0 6px darken(#556270, 5%);
	-webkit-box-shadow: -3px 0 6px darken(#556270, 5%);
	box-shadow: -3px 0 6px darken(#556270, 5%);

	-moz-transition: all 300ms;
	-webkit-transition: all 300ms;
	transition: all 300ms;
}

body.menu-active div#content { left: 200px; border-radius: 7px 0 0 7px; }
body.menu-active div#content .menu-trigger { left: 210px; }


button.navbar-toggle{
    float: left;
    margin-left: 15px;
    margin-top: 15px;
}

ul.navbar-slide{
    background-color: F00;
}

ul.navbar-slide li > a{
    color: #FFF;
}
ul.navbar-slide li > a:hover{
    background-color: #7C848C;
}

</style>
    
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <header id="header">
            <?php
                NavBar::begin([
                    'brandLabel' => 'My Company',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                ]);

                    $menuItems = [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'Sample', 'url' => ['/sample/form']],
                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                    } else {
                        $menuItems[] = [
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ];
                    }

                    echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => $menuItems,
                    ]);
                NavBar::end();
            ?>
        </header>
            
        <nav id="slide-menu">
            <?php
                echo Nav::widget([
                'options' => ['class' => 'navbar-slide'],
                    'items' => $menuItems,
                ]);
            ?>
        </nav>
        
        <div id="content" class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <!-- 提示信息 -->
            <?= Alert::widget() ?>
            <?= $content ?>

        </div>
        
        <footer class="footer">
            <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
    </div>
    


    <?php $this->endBody() ?>
</body>

<script type="text/javascript">
/*
  Slidemenu
*/
$(document).ready(function() {
    $("button[data-toggle=collapse]").click(function(){
        // 禁用data-api
        $(document).off('.data-api');
        
        if($('body').hasClass('menu-active')) {
            $('body').removeClass('menu-active');
        } else {
            $('body').addClass('menu-active');
        }
    });
});

$(window).resize(function() {
    if($( window ).width() >= 690) {
        $('body').removeClass('menu-active');
    }
});


</script>

</html>
<?php $this->endPage() ?>
