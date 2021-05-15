<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%musics}}`.
 */
class m210430_050440_create_musics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%musics}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'artist'=>$this->string(100)->notNull(),
            // 'file'=>$this->string(30)->notNull(),
            'url'=>$this->string(200)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%musics}}');
    }
}
