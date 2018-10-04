<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "trip".
 *
 * @property int $id
 * @property int $created_at
 * @property int $date
 * @property int $driver
 * @property int $user_id
 */
class Trip extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                ],
                'value' => date("Y-m-d H:i:s")
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'date'], 'safe'],
            [['driver', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'created_at' => 'Дата добавления',
            'date' => 'Дата поездки',
            'driver' => 'Водитель',
            'user_id' => 'Кто добавил',
        ];
    }

    public function getDriverName()
    {
        return $this->hasOne(User::className(), ['id' => 'driver']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
