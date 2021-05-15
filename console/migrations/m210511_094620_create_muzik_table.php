<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%muzik}}`.
 */
class m210511_094620_create_muzik_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%muzik}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'artist'=>$this->string(100)->notNull(),
            'file'=>$this->string(30)->notNull(),
            'url'=>$this->string(200)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%muzik}}');
    }
}
