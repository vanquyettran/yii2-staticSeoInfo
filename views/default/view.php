<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\staticSeoInfo\models\StaticSeoInfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Static Seo Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-seo-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'route',
            'heading',
            'page_title',
            'meta_title',
            'meta_description',
            'description',
            'long_description:ntext',
            'content:ntext',
            'menu_label',
            'active',
            'type',
            'status',
            'doindex',
            'dofollow',
            'shown_on_menu',
            'create_time:datetime',
            'update_time:datetime',
            'image_id',
            'creator_id',
            'updater_id',
        ],
    ]) ?>

</div>
