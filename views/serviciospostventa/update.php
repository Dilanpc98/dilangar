<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiciosPostventa $model */

$this->title = Yii::t('app', 'Update Servicios Postventa: {name}', [
    'name' => $model->id_servicio,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicios Postventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_servicio, 'url' => ['view', 'id_servicio' => $model->id_servicio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="servicios-postventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
