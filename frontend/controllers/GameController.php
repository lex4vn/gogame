<?php

namespace frontend\controllers;

use common\models\Game;
use frontend\models\search\GameSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
class GameController extends Controller
{
    public function actionBest()
    {
        return $this->render('best');
    }

    public function actionHot()
    {
        return $this->render('hot');
    }

    public function actionIndex()
    {
        $searchModel = new GameSearch();
        //var_dump(Yii::$app->request->queryParams);die;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['image' => SORT_DESC]
        ];
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }

    public function actionPopular()
    {
        return $this->render('popular');
    }
    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
       // var_dump($slug);die;
        $model = Game::find()->andWhere(['slug'=>$slug])->one();
        if (!$model) {
            throw new NotFoundHttpException;
        }
        
        //Related games
        $searchModel = new GameSearch();
        //var_dump(Yii::$app->request->queryParams);die;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['image' => SORT_DESC]
        ];
        
        //var_dump($model->view);die;
        //$viewFile = $model->view ?: 'view';
       // return $this->render($viewFile, ['model'=>$model]);
        return $this->render('view', ['model'=>$model,'dataProvider'=>$dataProvider]);
    }

}
