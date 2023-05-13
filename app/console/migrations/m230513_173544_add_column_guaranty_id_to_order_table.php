<?php

use yii\db\Migration;

/**
 * Class m230513_173544_add_column_guaranty_id_to_order_table
 */
class m230513_173544_add_column_guaranty_id_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('order', 'guaranty_id', $this->integer());

        // creates index for column `guaranty_id`
        $this->createIndex(
            '{{%idx-order-guaranty_id}}',
            '{{%order}}',
            'guaranty_id'
        );

        // add foreign key for table `{{%order}}`
        $this->addForeignKey(
            '{{%fk-order-guaranty_id}}',
            '{{%order}}',
            'guaranty_id',
            '{{%guaranty}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-order-guaranty_id}}', 'order');

        $this->dropIndex('{{%idx-order-guaranty_id}}', 'order');

        $this->dropColumn('order', 'guaranty_id');
    }
}
