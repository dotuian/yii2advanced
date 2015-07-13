<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    
    
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'role_name') ?>
            
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <?php
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'role_name',
                        'role_status',
                        'version',
                        'create_user',
                        [
                            'attribute' => 'create_time',
                            'value' => 'create_time',
//                            'format' => 'raw',
//                            'filter' => DatePicker::widget([
//                                'model' => $searchModel,
//                                'attribute' => 'create_time',
//                                'clientOptions' => [
//                                    'autoClose' => true,
//                                    'format' => 'yyyy-MM-dd'
//                                ]
//                            ]),
                        ],
                        'update_user',
                        'update_time',
                        ['class' => 'yii\grid\ActionColumn'],
                    ]
                ]);
            ?>
            
            
        </div>
    </div>
    
    
    

</div>
