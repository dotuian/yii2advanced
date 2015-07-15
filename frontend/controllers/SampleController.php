<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\widgets\Alert;

use frontend\models\RoleForm;

class SampleController extends \yii\web\Controller {
    
    public $layout = 'split';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => null,
                        'allow' => true,
                        'roles' => ['@'], // 认证用户
                    ],
                ],
            ]
        ];
    }
    
    
    /**
     * http://www.yiiframework.com/doc-2.0/yii-base-controller.html#actions()-detail
     * Declares external actions for the controller
     * @return type
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_PROD ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionForm() {
        $model = new RoleForm();
        
        return $this->render('form', [
            'model' => $model,
        ]);
    }
    
    
    public function actionRoles() {
        
        $model = new RoleForm();
        
        // 添加
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->create()) {
                Yii::$app->session->addFlash(Alert::SUCCESS, '创建成功！');
            } else {
                Yii::$app->session->addFlash(Alert::WARNING, '创建失败！');
            }
        } else {
            Yii::error(print_r($model->errors, true));
        }


        // 検索
        $searchModel = new RoleForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        
        return $this->render('roles', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }
    
    
    
}

