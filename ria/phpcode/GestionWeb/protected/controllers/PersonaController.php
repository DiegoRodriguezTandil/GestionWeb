<?php

class PersonaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Persona;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
		   // $myfile = CUploadedFile::getInstance($model,'foto');
			//$model->foto=$myfile;
			if($model->save())
			//	 $this->updatePhoto($model, $myfile);
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	
	   /*--------------
        * Upload and crunch an image
        ----------------*/
        public function updatePhoto($model, $myfile ) {
           if (is_object($myfile) && get_class($myfile)==='CUploadedFile') {
                $ext = $model->image->getExtensionName();
 
		//generate a filename for the uploaded image based on a random number
		// but check that the random number has not already been used
                if ($model->filename=='' or is_null($model->filename)) {
                    $n=1;
                    // loop until random is unqiue - which it probably is first time!
                    while ($n>0) {
                        $rnd=dechex(rand()%999999999);
                        $filename=$model->property->ref . '_' . $rnd . '.' . $ext;
                        $n=Photos::model()->count('filename=:filename',array('filename'=>$filename));
                    }
                $model->filename=$filename;
                }
 
                $model->save();
 
                $model->image->saveAs($model->getPath());  //model->getPath see below
 
                $image = Yii::app()->image->load($model->getPath());
		//Crunch the photo to a size set in my System Options Table
		//I hold the max size as 800 meaning to fit in an 800px x 800px square
                $size=$this->getOption('PhotoLarge');
                $image->resize($size[0], $size[0])->quality(75)->sharpen(20);
                $image->save(); 
 
		// Now create a thumb - again the thumb size is held in System Options Table
		$size=$this->getOption('PhotoThumb');
                $image->resize($size[0], $size[0])->quality(75)->sharpen(20);
                $image->save($model->getThumb()); // or $image->save('images/small.jpg');
                return true;
             } else return false;
        }

	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Persona');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Persona('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persona']))
			$model->attributes=$_GET['Persona'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Persona::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='persona-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
