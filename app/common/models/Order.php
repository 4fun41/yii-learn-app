<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $order_type_id
 * @property int|null $price
 * @property int|null $guaranty_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Client $client
 * @property OrderType $orderType
 * @property Guaranty $guaranty
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
            // TODO сделать константой
            [['guaranty_id'], 'default', 'value' => 1],
            [['client_id', 'order_type_id', 'price', 'guaranty_id','created_at', 'updated_at'], 'integer'],
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
            [
                ['guaranty_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Guaranty::class,
                'targetAttribute' => ['guaranty_id' => 'id']
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
            'guaranty_id' => 'Guaranty ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

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
     * @return ActiveQuery
     */
    public function getClient(): ActiveQuery
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[OrderType]].
     *
     * @return ActiveQuery
     */
    public function getOrderType(): ActiveQuery
    {
        return $this->hasOne(OrderType::class, ['id' => 'order_type_id']);
    }

    /**
     * Gets query for [[Guaranty]].
     *
     * @return ActiveQuery
     */
    public function getGuaranty(): ActiveQuery
    {
        return $this->hasOne(Guaranty::class, ['id' => 'guaranty_id']);
    }
}
