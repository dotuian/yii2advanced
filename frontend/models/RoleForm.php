<?php

namespace frontend\models;

use Yii;
use common\models\BaseModel;
use yii\data\ActiveDataProvider;

/**
 * ContactForm is the model behind the contact form.
 */
class RoleForm extends BaseModel
{
    public $role_name;
    public $role_status;
    
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'role_status'], 'required'],
            
            [['create_time', 'update_time'], 'safe'],
            
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'verifyCode' => 'Verification Code',
        ]);
    }

    
    public function search($params) {
        $this->load($params);
        $query = Roles::find();
        
        $query->andFilterWhere(['delete_flag' => '0']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                // 参与排序的字段
                'attributes' => ['id'],
                // 排序方式指定
                'defaultOrder' => ['id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $dataProvider;
    }
    
    
    /**
     * 
     * @return type
     */
    public function create() {
        $role = new Roles();
        $role->role_name = $this->role_name;
        $role->role_status = '1';
        $role->delete_flag = '0';

        return $role->save(false);
    }
    
}
