<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concesionarios $model */

$this->title = Yii::t('app', 'Update Concesionarios: {name}', [
    'name' => $model->id_concesionario,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concesionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_concesionario, 'url' => ['view', 'id_concesionario' => $model->id_concesionario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="concesionarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
