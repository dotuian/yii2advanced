<?php
namespace common\models;

use yii\base\Model;

class BaseModel extends Model {

    public $version;
    public $create_user;
    public $create_time;
    public $update_user;
    public $update_time;
    public $delete_flag;
    
    public function attributeLabels()
    {
        return [
            'version' => 'version',
            'create_user' => 'create_user',
            'create_time' => 'create_time',
            'update_user' => 'update_user',
            'update_time' => 'update_time',
            'delete_flag' => 'delete_flag',
        ];
    }

}