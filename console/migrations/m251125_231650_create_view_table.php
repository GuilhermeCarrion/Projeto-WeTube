<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%view}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%video}}`
 * - `{{%user}}`
 */
class m251125_231650_create_view_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%view}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->string(16)->notNull(),
            'user_id' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `video_id`
        $this->createIndex(
            '{{%idx-view-video_id}}',
            '{{%view}}',
            'video_id'
        );

        // add foreign key for table `{{%video}}`
        $this->addForeignKey(
            '{{%fk-view-video_id}}',
            '{{%view}}',
            'video_id',
            '{{%video}}',
            'video_id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-view-user_id}}',
            '{{%view}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-view-user_id}}',
            '{{%view}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%video}}`
        $this->dropForeignKey(
            '{{%fk-view-video_id}}',
            '{{%view}}'
        );

        // drops index for column `video_id`
        $this->dropIndex(
            '{{%idx-view-video_id}}',
            '{{%view}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-view-user_id}}',
            '{{%view}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-view-user_id}}',
            '{{%view}}'
        );

        $this->dropTable('{{%view}}');
    }
}
