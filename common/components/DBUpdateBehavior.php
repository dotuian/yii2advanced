<?php

namespace app\common\components;

use Yii;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class DBUpdateBehavior extends Behavior {
    
    public $createUserAttribute = 'create_user';
    public $createTimeAttribute = 'create_time';

    public $updateUserAttribute = 'update_user';
    public $updateTimeAttribute = 'update_time';

    public $value;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->createUserAttribute, $this->createTimeAttribute],
                BaseActiveRecord::EVENT_BEFORE_UPDATE => [$this->updateUserAttribute, $this->updateTimeAttribute],
            ];
        }
    }

    /**
     * @inheritdoc
     */
    protected function getValue($event)
    {
        if ($this->value instanceof Expression) {
            return $this->value;
        } else {
            return $this->value !== null ? call_user_func($this->value, $event) : time();
        }
    }

    /**
     * Updates a timestamp attribute to the current timestamp.
     *
     * ```php
     * $model->touch('lastVisit');
     * ```
     * @param string $attribute the name of the attribute to update.
     */
    public function touch($attribute)
    {
        $this->owner->updateAttributes(array_fill_keys((array) $attribute, $this->getValue(null)));
    }
}

