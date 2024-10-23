<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ServiciosPostventa $model */

$this->title = $model->id_servicio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicios Postventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servicios-postventa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_servicio' => $model->id_servicio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_servicio' => $model->id_servicio], [
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
            'id_servicio',
            'fk_id_auto',
            'fk_id_cliente',
            'fk_id_concesionario',
            'tipo_servicio',
            'fecha_servicio',
            'costo',
        ],
    ]) ?>

</div>
