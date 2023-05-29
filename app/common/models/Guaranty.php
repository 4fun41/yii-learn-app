<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guaranty".
 *
 * @property int $id
 * @property string $name
 *
 * @property Order[] $orders
 */
class Guaranty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'guaranty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Order::class, ['guaranty_id' => 'id']);
    }
}
