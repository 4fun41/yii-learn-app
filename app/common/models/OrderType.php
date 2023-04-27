<?php

namespace common\models;

/**
 * This is the model class for table "order_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property Order[] $orders
 */
class OrderType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'order_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Order::class, ['order_type_id' => 'id']);
    }
}
