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
                <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
            
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
                //Gridview In Yiiframework 2.0
                //http://www.bsourcecode.com/yiiframework2/gridview-in-yiiframework-2-0/
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'showFooter'=>true,
                    'showHeader' => true,
                    'showOnEmpty'=>true,
                    //'emptyCell'=>'-',

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label'=>'ID',
                            'format' => 'raw',
                            'value' => function($data){
                                return Html::a($data->id, \yii\helpers\Url::to(['view', 'id'=>$data->id]), ['title' => 'Go']);
                            }
                        ],
                        'role_name',
                        [
                            'label' => '状态',
                            'value' => function($data){
                                return $data->role_status == '0' ? '停止' : '利用';
                            }
                        ],
                        'version',
                        'create_user',
                        [
                            'label' => '创建日期',
                            'attribute' => 'create_time',
                            //'format' => 'datetime',
                            'format' => ['date', 'php:Y-m-d H:i:s'],
                            'headerOptions' => ['width' => '200'],
                        ],
                        'update_user',
                        'update_time',
                                    
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'headerOptions' => ['width' => '150'],
                            'template' => '{view}{delete}',
                            'buttons' => [
                                'view' => function($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [
                                                'title' => Yii::t('app', 'Info'),
                                    ]);
                                },
                                'delete' => function($url, $model) {
                                    //return Html::a($data->id, \yii\helpers\Url::to(['view', 'id'=>$data->id]), ['title' => 'Go']);
                                    return Html::a('delete', ['delete', 'id'=>$model->id], ['class'=>'btn btn-primary']);
                                },
                            ],
                        ],
                    ],
                                        
         
                    'options'=>['class'=>'grid-view gridview-newclass'],
                    'tableOptions' =>['class' => 'table table-striped table-bordered'],
                    'rowOptions'=>function ($model, $key, $index, $grid){
                                    $class=$index % 2 ? 'odd' : 'even';
                                    return array('key'=>$key,'index'=>$index,'class'=>$class);
                                },

                ]);
            ?>
            
        </div>
    </div>
    
    
    

</div>
