<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\staticSeoInfo\searchModels\StaticSeoInfo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Static Seo Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-seo-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Static Seo Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'route',
            'heading',
            'page_title',
            // 'meta_title',
            // 'meta_description',
            // 'description',
            // 'long_description:ntext',
            // 'content:ntext',
            // 'menu_label',
            // 'active',
            // 'type',
            // 'status',
            // 'doindex',
            // 'dofollow',
            // 'shown_on_menu',
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'image_id',
            // 'creator_id',
            // 'updater_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
