<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ventas $model */

$this->title = Yii::t('app', 'Update Ventas: {name}', [
    'name' => $model->id_venta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_venta, 'url' => ['view', 'id_venta' => $model->id_venta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ventas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
