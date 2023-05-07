<?php

use yii\db\Migration;

/**
 * Class m230507_201447_add_table_nutrition
 */
class m230507_201447_add_table_nutrition extends Migration
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
            '{{%nutrition}}',
            [
                'id' => $this->primaryKey(),
                'fruit_id' => $this->integer()->notNull(),
                'name' => $this->string(30),
                'value' => $this->decimal(6,2)
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk_nutritioin_fruit_fruit_id',
            '{{%nutrition}}',
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
        $this->dropTable('{{%nutrition}}');
    }
}
