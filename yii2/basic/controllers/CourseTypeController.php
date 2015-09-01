<?php

namespace app\controllers;

use Yii;
use app\models\CourseType;
use app\models\CourseTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Course;
use app\models\Clss;

/**
 * CourseTypeController implements the CRUD actions for CourseType model.
 */
class CourseTypeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CourseType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CourseType model.
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
     * Creates a new CourseType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CourseType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ct_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CourseType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ct_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CourseType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	try {
	        
    		//	$this->findModel($id)->delete();
    		$ct = $this->findModel($id);
    		//$crs = $ct->courses;
    		//$cls = $ct->clsses;
    		
    		$crs_count = Course::find()
    		->where(['crs_ct_id' => $id])
    		->count();
    		
    		$cls_count = Clss::find()
    		->where(['clss_ct_id' => $id])
    		->count();
    		
    		Yii::$app->session->setFlash('message', "You cannot delete this record!");
    		
    		if($crs_count==0 && $cls_count==0)
    		{
    			$ct->delete();
    	//	Yii::$app->session->setFlash('success','The car was successfully deleted');
    		
    		
    //		foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    			echo '<div class="alert alert-success">' . 'The car was successfully deleted' . '</div>';
    	//	}
    		
    		}
    		else 
    			//header("HTTP/1.0 400 Relation Restriction");
    			
    			Yii::$app->session->setFlash('message', "You cannot delete this record!");
    		} catch (CDbException $e) {
    			if($e->errorInfo[1] == 1451) {
    				header("HTTP/1.0 400 Relation Restriction");
    				echo "Your error message.\n";
    			} else {
    				throw $e;
    			}	        
   // 		} catch (IntegrityException $e) {
	     //   	if($e->getCode()===23000){
	        		//You can have nother error handling
	//        		header("HTTP/1.0 400 Relation Restriction");
	       // 	}else{
	        //		throw $e;
	        	//}
	    }
        return $this->redirect(['index']);
    }

    /**
     * Finds the CourseType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CourseType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CourseType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
