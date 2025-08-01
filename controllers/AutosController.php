<?php

namespace app\controllers;

use Yii;
use app\models\Autos;
use app\models\AutosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AutosController implements the CRUD actions for Autos model.
 */
class AutosController extends Controller
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
     * Lists all Autos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AutosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autos model.
     * @param int $id_auto Id Auto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_auto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_auto),
        ]);
    }

    /**
     * Creates a new Autos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Autos();
        $message = '';

        if ($this->request->isPost) {
           $transaction = Yii::$app->db->beginTransaction();
           try {
                if ($model->load($this->request->post())){
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                   if($model->save() && (!$model->imageFile || $model->upload())){
                    $transaction->commit();
                    return $this->redirect(['view', 'id_auto' => $model->id_auto]);
                   }else{
                        $message= 'Error al cargar el Auto';
                        $transaction->rollBack();
                   } 
                }else{
                    $message = 'Error al cargar la portada';
                    $transaction->rollBack();
                }
                }catch(\Exception $e){
                    $transaction->rollBack();
                    $message = 'Error al guardar el auto' . $e;
                }
        }else{
            $model->loadDefaultValues();
        }
          
           return $this->render('create', [
            'model' => $model,
            'message' => $message,
        ]);
    }

    /**
     * Updates an existing Autos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_auto Id Auto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_auto)
    {
        $model = $this->findModel($id_auto);
        $message= '';
        if($this->request->isPost && $model->load($this->request->post())){
            $model-> imageFile = UploadedFile::getInstance($model, 'imageFile');

            if($model->save() && (!$model->imageFile || $mode-> upload())){
                return $this->redirect(['view', 'id_auto'=> $model->id_auto]);
            }else{
                $message = 'Error al guardar el auto';
            }
        }

        return $this->render('update', [
            'model' => $model,
            'message' => $message,
        ]);
    }

    /**
     * Deletes an existing Autos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_auto Id Auto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_auto)
    {
        $model = $this->findModel($id_auto);
        $model->deletePortada();
        $model->delete();
            return $this->redirect(['index']);
    }

    /**
     * Finds the Autos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_auto Id Auto
     * @return Autos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_auto)
    {
        if (($model = Autos::findOne(['id_auto' => $id_auto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
