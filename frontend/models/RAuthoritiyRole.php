<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_authoritiy_role".
 *
 * @property string $id
 * @property string $role_id
 * @property string $authority_id
 * @property integer $version
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 * @property string $delete_flag
 *
 * @property Authorities $authority
 * @property Roles $role
 */
class RAuthoritiyRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'r_authoritiy_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'authority_id'], 'required'],
            [['id', 'role_id', 'authority_id', 'version', 'create_user', 'update_user'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['delete_flag'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'authority_id' => 'Authority ID',
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
    public function getAuthority()
    {
        return $this->hasOne(Authorities::className(), ['id' => 'authority_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }
}
