<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concesionarios $model */

$this->title = Yii::t('app', 'Create Concesionarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concesionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concesionarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
