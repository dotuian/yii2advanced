<?php

namespace frontend\models;

use Yii;
use frontend\widgets\Alert;

/**
 * This is the model class for table "roles".
 *
 * @property string $id
 * @property string $role_name
 * @property string $role_status
 * @property integer $version
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 * @property string $delete_flag
 *
 * @property RAuthoritiyRole[] $rAuthoritiyRoles
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_status', 'delete_flag'], 'string'],
            [['version', 'create_user', 'update_user'], 'integer'],
            [['create_user'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['role_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'role_status' => 'Role Status',
            'version' => 'Version',
            'create_user' => 'Create User',
            'create_time' => 'Create Time',
            'update_user' => 'Update User',
            'update_time' => 'Update Time',
            'delete_flag' => 'Delete Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAuthoritiyRoles()
    {
        return $this->hasMany(RAuthoritiyRole::className(), ['role_id' => 'id']);
    }
    
    
}
