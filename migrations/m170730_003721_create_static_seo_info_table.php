<?php

use yii\db\Migration;

/**
 * Handles the creation of table `static_seo_info`.
 * Has foreign keys to the tables:
 *
 * - `image`
 * - `user`
 * - `user`
 */
class m170730_003721_create_static_seo_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('static_seo_info', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'route' => $this->string()->notNull(),
            'heading' => $this->string(),
            'page_title' => $this->string(),
            'meta_title' => $this->string(),
            'meta_description' => $this->string(511),
            'description' => $this->string(511),
            'long_description' => $this->text(),
            'content' => $this->text(),
            'menu_label' => $this->string(),
            'active' => $this->smallInteger(1),
            'type' => $this->integer(),
            'status' => $this->integer(),
            'doindex' => $this->smallInteger(1),
            'dofollow' => $this->smallInteger(1),
            'shown_on_menu' => $this->smallInteger(1),
            'create_time' => $this->integer()->notNull(),
            'update_time' => $this->integer()->notNull(),
            'image_id' => $this->integer(),
            'creator_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer(),
        ], $tableOptions);

        // creates index for column `image_id`
        $this->createIndex(
            'idx-static_seo_info-image_id',
            'static_seo_info',
            'image_id'
        );

        // add foreign key for table `image`
        $this->addForeignKey(
            'fk-static_seo_info-image_id',
            'static_seo_info',
            'image_id',
            'image',
            'id',
            'CASCADE'
        );

        // creates index for column `creator_id`
        $this->createIndex(
            'idx-static_seo_info-creator_id',
            'static_seo_info',
            'creator_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-static_seo_info-creator_id',
            'static_seo_info',
            'creator_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `updater_id`
        $this->createIndex(
            'idx-static_seo_info-updater_id',
            'static_seo_info',
            'updater_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-static_seo_info-updater_id',
            'static_seo_info',
            'updater_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `image`
        $this->dropForeignKey(
            'fk-static_seo_info-image_id',
            'static_seo_info'
        );

        // drops index for column `image_id`
        $this->dropIndex(
            'idx-static_seo_info-image_id',
            'static_seo_info'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-static_seo_info-creator_id',
            'static_seo_info'
        );

        // drops index for column `creator_id`
        $this->dropIndex(
            'idx-static_seo_info-creator_id',
            'static_seo_info'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-static_seo_info-updater_id',
            'static_seo_info'
        );

        // drops index for column `updater_id`
        $this->dropIndex(
            'idx-static_seo_info-updater_id',
            'static_seo_info'
        );

        $this->dropTable('static_seo_info');
    }
}
