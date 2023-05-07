<?php

use yii\db\Migration;

/**
 * Class m230507_223148_add_table_favourite_fruit
 */
class m230507_223148_add_table_favourite_fruit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%favourite_fruit}}',
            [
                'id' => $this->primaryKey(),
                'fruit_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk_favourite_fruit_fruit_fruit_id',
            '{{%favourite_fruit}}',
            ['fruit_id'],
            '{{%fruit}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favourite_fruit}}');
    }
}
