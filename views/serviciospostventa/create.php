<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiciosPostventa $model */

$this->title = Yii::t('app', 'Create Servicios Postventa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicios Postventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicios-postventa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
