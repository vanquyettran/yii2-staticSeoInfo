<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\staticSeoInfo\models\StaticSeoInfo */

$this->title = 'Create Static Seo Info';
$this->params['breadcrumbs'][] = ['label' => 'Static Seo Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-seo-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
