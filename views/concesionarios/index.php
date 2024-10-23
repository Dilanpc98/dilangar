<?php

use app\models\Concesionarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ConcesionariosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Concesionarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concesionarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Concesionarios'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_concesionario',
            'nombre',
            'direccion',
            'telefono',
            'correo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Concesionarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_concesionario' => $model->id_concesionario]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
