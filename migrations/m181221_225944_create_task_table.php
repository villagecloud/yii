<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m181221_225944_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'category' => $this->string(),
            'description' => $this->string(),
            'creation_date' => $this->string(),
            'due_date' => $this->string(),
            'attachment' => $this->string(),
            'manager_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `manager_id`
        $this->createIndex(
            'idx-task-manager_id',
            'task',
            'manager_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-task-manager_id',
            'task',
            'manager_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-task-manager_id',
            'task'
        );

        // drops index for column `manager_id`
        $this->dropIndex(
            'idx-task-manager_id',
            'task'
        );

        $this->dropTable('task');
    }
}
