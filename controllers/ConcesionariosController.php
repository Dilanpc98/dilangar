<?php

namespace app\controllers;

use app\models\Concesionarios;
use app\models\ConcesionariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConcesionariosController implements the CRUD actions for Concesionarios model.
 */
class ConcesionariosController extends Controller
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
     * Lists all Concesionarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConcesionariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Concesionarios model.
     * @param int $id_concesionario Id Concesionario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_concesionario)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_concesionario),
        ]);
    }

    /**
     * Creates a new Concesionarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Concesionarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_concesionario' => $model->id_concesionario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Concesionarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_concesionario Id Concesionario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_concesionario)
    {
        $model = $this->findModel($id_concesionario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_concesionario' => $model->id_concesionario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Concesionarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_concesionario Id Concesionario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_concesionario)
    {
        $this->findModel($id_concesionario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Concesionarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_concesionario Id Concesionario
     * @return Concesionarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_concesionario)
    {
        if (($model = Concesionarios::findOne(['id_concesionario' => $id_concesionario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
