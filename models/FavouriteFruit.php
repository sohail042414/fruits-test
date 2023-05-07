<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%favourite_fruit}}".
 *
 * @property int $id
 * @property int $fruit_id
 *
 * @property Fruit $fruit
 */
class FavouriteFruit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%favourite_fruit}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fruit_id'], 'required'],
            [['fruit_id'], 'integer'],
            [['fruit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fruit::class, 'targetAttribute' => ['fruit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fruit_id' => 'Fruit ID',
        ];
    }

    /**
     * Gets query for [[Fruit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFruit()
    {
        return $this->hasOne(Fruit::class, ['id' => 'fruit_id']);
    }
}
