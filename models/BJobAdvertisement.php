<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "b_job_advertisement".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $activated_at
 * @property integer $orientation_id
 * @property string $email
 * @property string $status
 *
 * @property POrientation $orientation
 */
class BJobAdvertisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_job_advertisement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'activated_at'], 'safe'],
            [['name', 'orientation_id', 'email'], 'required'],
            [['orientation_id'], 'integer'],
            [['status'], 'string'],
			['email', 'email'],
            [['name', 'email'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'activated_at' => Yii::t('app', 'Activated At'),
            'orientation_id' => Yii::t('app', 'Orientation'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrientation()
    {
        return $this->hasOne(POrientation::className(), ['id' => 'orientation_id']);
    }
}
