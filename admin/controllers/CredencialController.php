<?php

namespace app\controllers;

use Yii;
use app\models\Credencial;
use yii\filters\AccessControl;
use app\models\CredencialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CredencialController implements the CRUD actions for Credencial model.
 */
class CredencialController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Credencial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CredencialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Credencial model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Credencial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Credencial();
        if ($model->load(Yii::$app->request->post())) {
            if($model->ESTADO == 1) {
                $older = Credencial::find()->where(['ESTADO'=>'1',])->all();
                foreach($older as $entry) {
                    if(!$entry->IDCREDENCIAL == $model->IDCREDENCIAL) {
                        $entry->ESTADO = 0;
                        $entry->save();
                    }
                }
            }
            if($user = $model->signup()) {
                if(Yii::$app->getUser()->login($user)) {
                    return $this->redirect(['view', 'id' => $user->IDCREDENCIAL]);
                } else {
                    echo "erro 1";
                }
            } else {
                echo "erro 2";
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Credencial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->ESTADO == 1) {
                $older = Credencial::find()->where(['ESTADO'=>'1',])->all();
                foreach($older as $entry) {
                    if($entry->IDCREDENCIAL == $model->IDCREDENCIAL) {
                        
                    } else {
                        $entry->ESTADO = 0;
                        $entry->save();
                    }
                }
            }
            $model->setPassword($model->PASSWORD_ADMINISTRACAO);
            return $this->redirect(['view', 'id' => $model->IDCREDENCIAL]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Credencial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $results = Credencial::find()->where(["ESTADO"=>"1"])->all();
        if(empty(array_filter($results))) {
            $model = new Credencial();
            $model->USERNAME_ADMINISTRACAO = "admin";
            $model->PASSWORD_ADMINISTRACAO = "password";
            $model->ESTADO = 1;
            $model->setPassword($model->PASSWORD_ADMINISTRACAO);
            $model->save();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Credencial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Credencial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Credencial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findActive() {
        
    }
}
