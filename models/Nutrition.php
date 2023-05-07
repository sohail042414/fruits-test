<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nutrition}}".
 *
 * @property int $id
 * @property int $fruit_id
 * @property string|null $name
 * @property float|null $value
 *
 * @property Fruit $fruit
 */
class Nutrition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nutrition}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fruit_id'], 'required'],
            [['fruit_id'], 'integer'],
            [['value'], 'number'],
            [['name'], 'string', 'max' => 30],
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
            'name' => 'Name',
            'value' => 'Value',
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
