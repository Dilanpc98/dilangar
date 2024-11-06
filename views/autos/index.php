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

            //'id_auto',
            //'Portada',
            [
                'attribute' => 'portada',
                'format' => 'html',
                'value' => function(Autos $model){
                    if($model->portada)
                            return Html::img(Yii::getAlias('@web').'/portadas/'.$model->portada, ['style' => 'width:50px;']);
                        return null;
                    }
                
            ],
            'modelo',
            'anio',
            //'precio',
            [
                'attribute' => 'precio', // Cambia 'color' a 'price' o al atributo que contenga el valor en dólares
                'format' => 'html',
                'value' => function(Autos $model) {
                if ($model->precio !== null) { // Asegúrate de que el precio no sea nulo
                // Formatea el precio en dólares y lo devuelve como un texto HTML
                return Html::tag('span', '$' . number_format($model->precio, 2), [
                'style' => 'font-weight: bold;' // Estilo opcional para el texto
            ]);
        }
        return null;
    }
            ],
            
            //'color',
            [
                'attribute' => 'color',
                'format' => 'html',
                'value' => function(Autos $model) {
                if ($model->color) {
            // Devuelve un div con el color de fondo y un texto que muestra el código del color
                return Html::tag('div', '', [
                'style' => 'width: 50px; height: 20px; background-color: ' . Html::encode($model->color) . '; display: inline-block; border: 1px solid #000;',
                'title' => Html::encode($model->color) // Muestra el código del color como título
            ]);
        }
        return null;
    }
               
            ],
            'motor',
            'tipo',
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
