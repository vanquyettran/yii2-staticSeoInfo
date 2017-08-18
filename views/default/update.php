<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\staticSeoInfo\models\StaticSeoInfo */

$this->title = 'Update Static Seo Info: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Static Seo Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="static-seo-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
