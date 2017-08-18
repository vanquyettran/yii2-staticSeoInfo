<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/30/2017
 * Time: 2:24 PM
 */
namespace common\modules\staticSeoInfo\models;

use Yii;
use common\models\User;
use common\models\Image;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class StaticSeoInfo extends \common\modules\staticSeoInfo\baseModels\StaticSeoInfo
{
    public static function getRoutes()
    {
        return [
            'site/index' => Yii::t('app', 'Homepage'),
            'site/contact' => Yii::t('app', 'Contact'),
            'article/index' => Yii::t('app', 'News'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'creator_id',
                'updatedByAttribute' => 'updater_id',
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
                'value' => time(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'required'],
            [['long_description', 'content'], 'string'],
            [['active', 'type', 'status', 'doindex', 'dofollow', 'shown_on_menu', 'image_id'], 'integer'],
            [['name', 'route', 'heading', 'page_title', 'meta_title', 'menu_label'], 'string', 'max' => 255],
            [['meta_description', 'meta_keywords', 'description'], 'string', 'max' => 511],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id'], 'except' => 'test'],
        ];
    }
}