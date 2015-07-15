<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>


    <!-- http://flatfull.com/themes/first/form.html -->
    <div class="row"> 
        <div class="col-sm-6"> 
            <section class="panel">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_name') ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </section>

            <section class="panel"> 
                <div class="panel-body"> 
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>
                        <?= $form->field($model, 'role_status')->dropDownList(['0'=>'Not Use', '1'=>'Using']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </section> 
        </div> 

        <div class="col-sm-6"> 

            <section class="panel"> 
                <div class="panel-body"> 
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <?= $form->field($model, 'version') ?>
                        <?= $form->field($model, 'version') ?>
                        <?= $form->field($model, 'version') ?>
                        <?= $form->field($model, 'version') ?>
                        <?= $form->field($model, 'version') ?>
                        <?= $form->field($model, 'version') ?>
                        <?= $form->field($model, 'version') ?>

                    <?php ActiveForm::end(); ?>

                </div>
            </section> 
            
            <section class="panel">
                <div class="panel-body"> 
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </section>
            
            
        </div>
        
        
        
        
        
    </div>                                                    

</div>
