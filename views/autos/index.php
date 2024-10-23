<?php

use app\models\Autos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\AutosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Autos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Autos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_auto',
            'modelo',
            'anio',
            'precio',
            'color',
            //'motor',
            //'tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Autos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_auto' => $model->id_auto]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
