<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\ChangePasswordForm;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{

    public function behaviors(){
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['index', 'create', 'update', 'view', 'delete', 'reset-password', 'change-password'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['change-password'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'reset-password', 'change-password'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role == 'admin';
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],                    
                ],
            ],
        ];
    }

     /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $iduser Iduser
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())){
            if(!empty($model->password)){
                $model->setPassword($model->password);
            }
            if($model->save()){
                return $this->redirect(['view','id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iduser Iduser
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post())){
            if(!empty($model->password)){
                $model->setPassword($model->password);
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iduser Iduser
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionResetPassword($id){
        $user = $this->findModel($id);
        $user->password = $user->username;
        if($user->save()){
            Yii::$aap->session->setFlash('success', 'Password reset successfully');
        }else{
            Yii::$app->session->setFlash('error', 'Failed to reset password');
        }
        return $this->redirect(['index']);
    }

    public function actionChangePassword(){
        $model = new ChangePasswordForm();
        if($model->load(Yii::$app->request->post()) && $model->changePassword()){
            Yii::$app->session->setFlash('success', 'Password changed successfully');
            return $this->redirect(['index']);
            }
        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iduser Iduser
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
