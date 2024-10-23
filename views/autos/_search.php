<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AutosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="autos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_auto') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'anio') ?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'motor') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
