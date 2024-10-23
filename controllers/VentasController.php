<?php

namespace app\controllers;

use app\models\Ventas;
use app\models\VentasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VentasController implements the CRUD actions for Ventas model.
 */
class VentasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Ventas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VentasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ventas model.
     * @param int $id_venta Id Venta
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_venta)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_venta),
        ]);
    }

    /**
     * Creates a new Ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ventas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_venta' => $model->id_venta]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ventas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_venta Id Venta
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_venta)
    {
        $model = $this->findModel($id_venta);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_venta' => $model->id_venta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ventas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_venta Id Venta
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_venta)
    {
        $this->findModel($id_venta)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ventas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_venta Id Venta
     * @return Ventas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_venta)
    {
        if (($model = Ventas::findOne(['id_venta' => $id_venta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
