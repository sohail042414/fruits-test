<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%fruit}}".
 *
 * @property int $id
 * @property int $external_id
 * @property string $name
 * @property string $family
 * @property string $order
 * @property string $genus
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Nutrition[] $nutritions
 */
class Fruit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%fruit}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'name', 'family', 'order', 'genus'], 'required'],
            [['external_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'family', 'order', 'genus'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'external_id' => 'External ID',
            'name' => 'Name',
            'family' => 'Family',
            'order' => 'Order',
            'genus' => 'Genus',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Nutritions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNutritions()
    {
        return $this->hasMany(Nutrition::class, ['fruit_id' => 'id']);
    }

    /**
     * Gets query Favourite
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourite()
    {
        return $this->hasMany(FavouriteFruit::class, ['fruit_id' => 'id']);
    }
}
