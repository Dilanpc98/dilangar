<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Autos $model */

$this->title = Yii::t('app', 'Update Autos: {name}', [
    'name' => $model->id_auto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_auto, 'url' => ['view', 'id_auto' => $model->id_auto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="autos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
