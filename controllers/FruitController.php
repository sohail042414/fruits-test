<?php

namespace app\controllers;

use app\models\FavouriteFruitSearch;
use app\models\Fruit;
use app\models\FruitSearch;
use app\models\FavouriteFruit;
use app\models\NutritionSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FruitController implements the CRUD actions for Fruit model.
 */
class FruitController extends Controller
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
     * Lists all Fruit models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FruitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Favourite Fruits
     *
     * @return string
     */
    public function actionFavourite()
    {
        $searchModel = new FavouriteFruitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('favourite', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fruit model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $searchModel = new NutritionSearch();
        $searchModel->fruit_id = $id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Lists all Favourite Fruits
     *
     * @return string
     */
    public function actionAddFavourite($id)
    {   
        $favouriteCount = FavouriteFruit::find()->count();

        if($favouriteCount < 10){

            $existing = FavouriteFruit::find()->where(['fruit_id' => $id])->one();

            if(empty($existing)){
                $model = new FavouriteFruit();
                $model->fruit_id = $id;
                $model->save();
            }

        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        
    }

        /**
     * Lists all Favourite Fruits
     *
     * @return string
     */
    public function actionRemoveFavourite($id)
    {   

        $model = FavouriteFruit::find()->where(['fruit_id' => $id])->one();

        $model->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        
    }

    /**
     * Finds the Fruit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Fruit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fruit::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
