<?php

use app\models\ServiciosPostventa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ServiciosPostventaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Servicios Postventas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicios-postventa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Servicios Postventa'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_servicio',
            'fk_id_auto',
            'fk_id_cliente',
            'fk_id_concesionario',
            'tipo_servicio',
            'fecha_servicio',
            'costo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ServiciosPostventa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_servicio' => $model->id_servicio]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
