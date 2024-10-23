<?php

namespace app\controllers;

use app\models\Serviciospostventa;
use app\models\ServiciospostventaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiciosPostventaController implements the CRUD actions for ServiciosPostventa model.
 */
class ServiciospostventaController extends Controller
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
     * Lists all ServiciosPostventa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServiciosPostventaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiciosPostventa model.
     * @param int $id_servicio Id Servicio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_servicio)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_servicio),
        ]);
    }

    /**
     * Creates a new ServiciosPostventa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ServiciosPostventa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_servicio' => $model->id_servicio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServiciosPostventa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_servicio Id Servicio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_servicio)
    {
        $model = $this->findModel($id_servicio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_servicio' => $model->id_servicio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServiciosPostventa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_servicio Id Servicio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_servicio)
    {
        $this->findModel($id_servicio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiciosPostventa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_servicio Id Servicio
     * @return ServiciosPostventa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_servicio)
    {
        if (($model = ServiciosPostventa::findOne(['id_servicio' => $id_servicio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
