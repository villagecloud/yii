<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181221_211309_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password' => $this->string(),
            'auth_key' => $this->string(),
            'access_token' => $this->string(),
        ]);

        $this->createIndex("ix_id", "user","id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
