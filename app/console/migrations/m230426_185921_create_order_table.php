<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%client}}`
 * - `{{%order_type}}`
 */
class m230426_185921_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(),
            'order_type_id' => $this->integer(),
            'price' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `client_id`
        $this->createIndex(
            '{{%idx-order-client_id}}',
            '{{%order}}',
            'client_id'
        );

        // add foreign key for table `{{%client}}`
        $this->addForeignKey(
            '{{%fk-order-client_id}}',
            '{{%order}}',
            'client_id',
            '{{%client}}',
            'id',
            'CASCADE'
        );

        // creates index for column `order_type_id`
        $this->createIndex(
            '{{%idx-order-order_type_id}}',
            '{{%order}}',
            'order_type_id'
        );

        // add foreign key for table `{{%order_type}}`
        $this->addForeignKey(
            '{{%fk-order-order_type_id}}',
            '{{%order}}',
            'order_type_id',
            '{{%order_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%client}}`
        $this->dropForeignKey(
            '{{%fk-order-client_id}}',
            '{{%order}}'
        );

        // drops index for column `client_id`
        $this->dropIndex(
            '{{%idx-order-client_id}}',
            '{{%order}}'
        );

        // drops foreign key for table `{{%order_type}}`
        $this->dropForeignKey(
            '{{%fk-order-order_type_id}}',
            '{{%order}}'
        );

        // drops index for column `order_type_id`
        $this->dropIndex(
            '{{%idx-order-order_type_id}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
