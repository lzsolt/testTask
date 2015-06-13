<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "p_orientation".
 *
 * @property integer $id
 * @property string $name
 *
 * @property BJobAdvertisement[] $bJobAdvertisements
 */
class POrientation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_orientation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 128]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBJobAdvertisements()
    {
        return $this->hasMany(BJobAdvertisement::className(), ['orientation_id' => 'id']);
    }
}
