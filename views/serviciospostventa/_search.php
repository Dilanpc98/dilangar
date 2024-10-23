<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ServiciosPostventaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicios-postventa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_servicio') ?>

    <?= $form->field($model, 'fk_id_auto') ?>

    <?= $form->field($model, 'fk_id_cliente') ?>

    <?= $form->field($model, 'fk_id_concesionario') ?>

    <?= $form->field($model, 'tipo_servicio') ?>

    <?php // echo $form->field($model, 'fecha_servicio') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
