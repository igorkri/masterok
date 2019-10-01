<?php

namespace app\modules\admin\controllers\shop;

use Yii;
use app\models\shop\models\Brend;
use app\models\shop\search\BrendSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BrendController implements the CRUD actions for Brend model.
 */
class BrendController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Brend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $model = Brend::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'model' => $model,
        ]);
    }

    /**
     * Displays a single Brend model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Brend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brend();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {	
           	$model->image = UploadedFile::getInstance($model, 'image');
 
            if( $model->image ){
                $model->upload(); // смотри файл модели
            }
            unset($model->image);

            Yii::$app->session->setFlash('success', "Бренд {$model->name} добавлен");	 			
			
        } 
		if( Yii::$app->request->isAjax ){
//			return $this->renderAjax('create', [
//			'model' => $model,
//			]);
                    return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('create', [
			'model' => $model,
			]);
		} 
    }

    /**
     * Updates an existing Brend model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            
            $model->image = UploadedFile::getInstance($model, 'image');
          
            if( $model->image ){
                $model->upload();
            }
            
            unset($model->image);
           
            Yii::$app->session->setFlash('success', "Бренд {$model->name} обновлен");
            
//            $this->processValues($values, $model);
            return $this->redirect(['view', 'id' => $model->id]);
//            debug($model);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Brend model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Brend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brend::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
