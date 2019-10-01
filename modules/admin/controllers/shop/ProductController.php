<?php

namespace app\modules\admin\controllers\shop;

use Yii;
use app\models\shop\models\Product;
use app\models\shop\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
//        $images_photos = Product::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'images_photos' => $images_photos,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
         $model = new Product();
        
         if ($model->load(Yii::$app->request->post()) && $model->save()) {	
           	$model->image = UploadedFile::getInstance($model, 'image');
 
            if( $model->image ){
                $model->upload(); // смотри файл модели
            }
            unset($model->image);
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();
            Yii::$app->session->setFlash('success', "Товар {$model->name} добавлен");	 			
			
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
        
//        ===========================================
//
//        $post = Yii::$app->request->post();
//        if ($model->load($post) && $model->save() && Model::loadMultiple($values, $post)) {
//            $this->processValues($values, $model);
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//                'values' => $values,
//            ]);
//        }
               
        
//        
//        $model = new Product();
//        
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);

        $post = Yii::$app->request->post();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            
            $model->image = UploadedFile::getInstance($model, 'image');
          
            if( $model->image ){
                $model->upload();
            }
            
            unset($model->image);
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();
         
            
            Yii::$app->session->setFlash('success', "Товар {$model->name} обновлен");
            
//            $this->processValues($values, $model);
            return $this->redirect(['view', 'id' => $model->id]);
//            debug($model);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
//        =======================
        
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}