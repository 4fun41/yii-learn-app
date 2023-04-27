<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $order_type_id
 * @property int|null $price
 *
 * @property Client $client
 * @property OrderType $orderType
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['client_id', 'order_type_id', 'price'], 'default', 'value' => null],
            [['client_id', 'order_type_id', 'price'], 'integer'],
            [
                ['client_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Client::class,
                'targetAttribute' => ['client_id' => 'id']
            ],
            [
                ['order_type_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => OrderType::class,
                'targetAttribute' => ['order_type_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'order_type_id' => 'Order Type ID',
            'price' => 'Price',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[OrderType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderType(): \yii\db\ActiveQuery
    {
        return $this->hasOne(OrderType::class, ['id' => 'order_type_id']);
    }
}
