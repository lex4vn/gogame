<?php

use yii\db\Schema;
use yii\db\Migration;

class m180310_123803_game extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%game_category}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(1024)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text(),
            'icon' => $this->string(256),
            'image' => $this->string(1024),
            'parent_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%game}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(1024)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
            'view' => $this->string(),
            'category_id' => $this->integer(),
            'type_id' => $this->integer(),
            'embed_url' => $this->string(1024),
            'thumbnail_base_url' => $this->string(1024),
            'thumbnail_path' => $this->string(1024),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'like' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);


        $this->addForeignKey('fk_game_author', '{{%game}}', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_game_updater', '{{%game}}', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_game_category', '{{%game}}', 'category_id', '{{%game_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_game_category_section', '{{%game_category}}', 'parent_id', '{{%game_category}}', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_game_author', '{{%game}}');
        $this->dropForeignKey('fk_game_updater', '{{%game}}');
        $this->dropForeignKey('fk_game_category', '{{%game}}');
        $this->dropForeignKey('fk_game_category_section', '{{%game_category}}');

        $this->dropTable('{{%game}}');
        $this->dropTable('{{%game_category}}');
    }
}
