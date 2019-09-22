<?php

namespace app\modules\admin\controllers\shop;

use Yii;
use app\models\shop\models\Product;
use app\models\shop\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\shop\models\Attribute;
use app\models\shop\models\Value;
use yii\base\Model;

/**
 * ProductsController implements the CRUD actions for Product model.
 */
class ProductsController extends Controller
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $values = $this->initValues($model);

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save() && Model::loadMultiple($values, $post)) {
            $this->processValues($values, $model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'values' => $values,
            ]);
        }
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
        $values = $this->initValues($model);

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save() && Model::loadMultiple($values, $post)) {
            $this->processValues($values, $model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'values' => $values,
            ]);
        }
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

    /**
     * @param Product $model
     * @return Value[]
     */
    private function initValues(Product $model)
    {
        /** @var Value[] $values */
        $values = $model->getValues()->with('attribute0')->indexBy('attribute_id')->all();
        $attributes = Attribute::find()->indexBy('id')->all();

        foreach (array_diff_key($attributes, $values) as $attribute) {
            $values[$attribute->id] = new Value(['attribute_id' => $attribute->id]);
        }

        foreach ($values as $value) {
            $value->setScenario(Value::SCENARIO_TABULAR);
        }
        return $values;
    }

    /**
     * @param Value[] $values
     * @param Product $model
     */
    private function processValues($values, Product $model)
    {
        foreach ($values as $value) {
            $value->product_id = $model->id;
            if ($value->validate()) {
                if (!empty($value->value)) {
                    $value->save(false);
                } else {
                    $value->delete();
                }
            }
        }
    }
}
