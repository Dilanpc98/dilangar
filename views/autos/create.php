<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Autos $model */

$this->title = Yii::t('app', 'Create Autos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autos-create">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= $message ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
