<?php

use app\models\Ventas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\VentasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ventas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ventas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_venta',
            'fk_id_auto',
            'fk_id_cliente',
            'fecha_venta',
            'cantidad',
            'total',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ventas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_venta' => $model->id_venta]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
