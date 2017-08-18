<?php

namespace common\modules\staticSeoInfo\baseModels;

use Yii;
use common\models\User;
use common\models\Image;

/**
 * This is the model class for table "static_seo_info".
 *
 * @property integer $id
 * @property string $name
 * @property string $route
 * @property string $heading
 * @property string $page_title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $description
 * @property string $long_description
 * @property string $content
 * @property string $menu_label
 * @property integer $active
 * @property integer $type
 * @property integer $status
 * @property integer $doindex
 * @property integer $dofollow
 * @property integer $shown_on_menu
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $image_id
 * @property integer $creator_id
 * @property integer $updater_id
 * @property string $meta_keywords
 *
 * @property User $creator
 * @property Image $image
 * @property User $updater
 */
class StaticSeoInfo extends \common\db\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_seo_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route', 'create_time', 'update_time', 'creator_id'], 'required'],
            [['long_description', 'content'], 'string'],
            [['active', 'type', 'status', 'doindex', 'dofollow', 'shown_on_menu', 'create_time', 'update_time', 'image_id', 'creator_id', 'updater_id'], 'integer'],
            [['name', 'route', 'heading', 'page_title', 'meta_title', 'menu_label'], 'string', 'max' => 255],
            [['meta_description', 'description', 'meta_keywords'], 'string', 'max' => 511],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id'], 'except' => 'test'],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id'], 'except' => 'test'],
            [['updater_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updater_id' => 'id'], 'except' => 'test'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'route' => 'Route',
            'heading' => 'Heading',
            'page_title' => 'Page Title',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
            'long_description' => 'Long Description',
            'content' => 'Content',
            'menu_label' => 'Menu Label',
            'active' => 'Active',
            'type' => 'Type',
            'status' => 'Status',
            'doindex' => 'Doindex',
            'dofollow' => 'Dofollow',
            'shown_on_menu' => 'Shown On Menu',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'image_id' => 'Image ID',
            'creator_id' => 'Creator ID',
            'updater_id' => 'Updater ID',
            'meta_keywords' => 'Meta Keywords',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }
}
