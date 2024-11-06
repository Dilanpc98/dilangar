<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Autos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="autos-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if($model->portada): ?>
        <div class="from-group">
            <?= Html::label('Imagen Actual') ?>
            <div>
                <?= Html::img(Yii::getAlias('@web' . '/portadas/' . $model->portada, ['style' => 'width: 200px; ']))?> 
            </div>
        </div>
    <?php endif; ?>

    <?php //$form->field($model, 'Portada')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->fileInput()->label('Selecionar Portada')?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true, 'placeholder' => 'Modelo del carro', 'required'=>true]) ?>

    <?= $form->field($model, 'anio')->input(['number', 'min' => 1900, 'max' => date('Y')]) 
                                    ->textInput(['pattern'=> '\d{4}', 'title' => 'Debe ser un año de 4 digitos', 'placeholder' => 'YYYY', 'required' => true]) ?>

    <?= $form->field($model, 'precio')->input(['number', 'min' => 1000, 'max' => 999999999])
                                      ->textInput(['title' => 'Debe ser un precio de 9 digitos', 'placeholder' => 'Precio del auto', 'required'=>true]) ?>

    <?= $form->field($model, 'color')->input('color', ['class' => 'form-control form-control-color','id' => 'ejemplo-de-color','value' => '#563d7c','title' => 'Seleccione un color']) ?>

    <?= $form->field($model, 'motor')->textInput(['maxlength' => true, 'placeholder' => 'Motor del auto', 'required'=>true]) ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true, 'placeholder' => 'Tipo de auto', 'required'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
