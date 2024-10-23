<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VentasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ventas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_venta') ?>

    <?= $form->field($model, 'fk_id_auto') ?>

    <?= $form->field($model, 'fk_id_cliente') ?>

    <?= $form->field($model, 'fecha_venta') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
