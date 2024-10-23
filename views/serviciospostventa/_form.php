<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ServiciosPostventa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicios-postventa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_id_auto')->textInput() ?>

    <?= $form->field($model, 'fk_id_cliente')->textInput() ?>

    <?= $form->field($model, 'fk_id_concesionario')->textInput() ?>

    <?= $form->field($model, 'tipo_servicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_servicio')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
