<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Autos $model */

$this->title = $model->id_auto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="autos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_auto' => $model->id_auto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_auto' => $model->id_auto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_auto',
            //'Portada',
            [
                'attribute' => 'portada',
                'format' => 'html',
                'value' => function($model){
                    return Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portada, ['style' => 'width: 200px']);
                }
            ],
            'modelo',
            'anio',
            'precio',
            'color',
            'motor',
            'tipo',
        ],
    ]) ?>

</div>
