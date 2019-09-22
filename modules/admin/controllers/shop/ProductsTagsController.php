<?php

namespace app\modules\admin\controllers\shop;

use Yii;
use app\models\shop\models\ProductTag;
use app\models\shop\search\ProductTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductTagController implements the CRUD actions for ProductTag model.
 */
class ProductsTagsController extends Controller
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
     * Lists all ProductTag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductTag model.
     * @param integer $product_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_id, $tag_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $tag_id),
        ]);
    }

    /**
     * Creates a new ProductTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductTag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'tag_id' => $model->tag_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_id, $tag_id)
    {
        $model = $this->findModel($product_id, $tag_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'tag_id' => $model->tag_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_id, $tag_id)
    {
        $this->findModel($product_id, $tag_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $tag_id
     * @return ProductTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $tag_id)
    {
        if (($model = ProductTag::findOne(['product_id' => $product_id, 'tag_id' => $tag_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
