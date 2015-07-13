<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authorities".
 *
 * @property string $id
 * @property string $authority_name
 * @property string $action
 * @property string $authority_status
 * @property integer $version
 * @property string $create_user
 * @property string $create_tiime
 * @property string $update_user
 * @property string $update_time
 * @property string $delete_flag
 *
 * @property RAuthoritiyRole[] $rAuthoritiyRoles
 */
class Authorities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authorities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['authority_name'], 'required'],
            [['authority_status', 'delete_flag'], 'string'],
            [['version', 'create_user', 'update_user'], 'integer'],
            [['create_tiime', 'update_time'], 'safe'],
            [['authority_name', 'action'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'authority_name' => 'Authority Name',
            'action' => 'Action',
            'authority_status' => 'Authority Status',
            'version' => 'Version',
            'create_user' => 'Create User',
            'create_tiime' => 'Create Tiime',
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
        return $this->hasMany(RAuthoritiyRole::className(), ['authority_id' => 'id']);
    }
}
