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
		$model= new Persona;
		 // Adding an empty Mail to the form
        $mails = array( new Mail, );
		$tels = array( new Telefono, );
		$dirs = array( new Direccion, );

		if(isset($_POST['Persona'], $_POST['Mail'], $_POST['Telefono'], $_POST['Direccion']))
		{
			$model->attributes=$_POST['Persona'];
			$valid=$model->validate();
			if($model->save())
		    foreach ( $_POST['Mail'] as $i => $mail ) {
		    	$mails[$i] = new Mail;  
		        if ( isset( $_POST['Mail'][$i] ) ){//print_r($model); die();
		        	$mails[$i]->attributes=$_POST['Mail'][$i];			            	
		            $mails[$i]->tipo = $_POST['Mail'][$i]['tipo'];
					$mails[$i]->direccion = $_POST['Mail'][$i]['direccion'];
					$mails[$i]->persona_id = $model->id;	
					$valid = $valid && $mails[$i]->validate();  
					$mails[$i]->save();
				 }
			  }
			foreach ( $_POST['Telefono'] as $i => $tel ) {
		    	$tels[$i] = new Telefono;  
		        if ( isset( $_POST['Telefono'][$i] ) ){//print_r($model); die();
		        	$tels[$i]->attributes=$_POST['Telefono'][$i];			            	
		            $tels[$i]->tipoid = $_POST['Telefono'][$i]['tipoid'];
					$tels[$i]->localidad = $_POST['Telefono'][$i]['localidad'];
					$tels[$i]->numero = $_POST['Telefono'][$i]['numero'];
					$tels[$i]->personaid = $model->id;	
					$valid = $valid && $tels[$i]->validate();  
					$tels[$i]->save();
				 }
			  }
			foreach ( $_POST['Direccion'] as $i => $dir ) {
		    	$dirs[$i] = new Direccion;  
		        if ( isset( $_POST['Direccion'][$i] ) ){//print_r($_POST['Direccion'][$i]); die();
		        	$dirs[$i]->attributes=$_POST['Direccion'][$i];			            	
		            $dirs[$i]->tipodireccion = $_POST['Direccion'][$i]['tipodireccion'];
					$dirs[$i]->localidad = $_POST['Direccion'][$i]['localidad'];
					$dirs[$i]->numero = $_POST['Direccion'][$i]['numero'];
					$dirs[$i]->persona_id = $model->id;	
					//$valid = $valid && $dirs[$i]->validate();  
					$dirs[$i]->save();
				 }
			  }
			if (isset($model->id))
				$this->redirect(array('view','id'=>$model->id));
			
		}

		$this->render('create',array(
			'model'=>$model, 'mails' => $mails,
			'tels' => $tels,
			'dirs' => $dirs,
			'dirsAgregados' => isset($_POST['dirsAgregados']) ? count($_POST['dirsAgregados'])-1 : 0,
			'mailsAgregados' => isset($_POST['mailsAgregados']) ? count($_POST['mailsAgregados'])-1 : 0,
			'telsAgregados' => isset($_POST['telsAgregados']) ? count($_POST['telsAgregados'])-1 : 0,  
		));
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
		
		$id = $model->getPrimaryKey();
		$personatablas=$model->with('mails')->with('telefonos')->with('direccions')->findAll('t.id=:id',array(':id'=>$id));
		$mails = array( new Mail, );
		$tels = array( new Telefono, );
		$dirs = array( new Direccion, );
		 $uploadedFile=CUploadedFile::getInstance($model,'foto');
		die($uploadedFile);
		if (sizeof($personatablas[0]->mails) > 0)
			$mails = $personatablas[0]->mails;	
		if (sizeof($personatablas[0]->telefonos) > 0)
			$tels = $personatablas[0]->telefonos;	
		if (sizeof($personatablas[0]->direccions) > 0)
			$dirs = $personatablas[0]->direccions;	
		
		$mailsAgregados = sizeof($mails);
		$telsAgregados = sizeof($tels);
		$dirsAgregados = sizeof($dirs);

		if(isset($_POST['Persona'], $_POST['Mail'], $_POST['Telefono'], $_POST['Direccion']))
		{
			$model->attributes=$_POST['Persona'];
			$valid=$model->validate(); 
			if($model->save())
		    foreach ( $_POST['Mail'] as $i => $mail ) {
		    	$mails[$i] = new Mail;  
		        if ( isset( $_POST['Mail'][$i]) ){//print_r($model); die();
		        	$mails[$i]->attributes=$_POST['Mail'][$i];		
		        	if ( isset( $_POST['Mail'][$i]['id']) ) {
		        		$modelDetail = Mail::model();
						$mails[$i] = $this->loadModeldetail($_POST['Mail'][$i]['id'], $modelDetail);
		        	}										
		        	$mails[$i]->attributes=$_POST['Mail'][$i];			            	
		            $mails[$i]->tipo = $_POST['Mail'][$i]['tipo'];
					$mails[$i]->direccion = $_POST['Mail'][$i]['direccion'];
					$mails[$i]->persona_id = $model->id;	
					$valid = $valid && $mails[$i]->validate();  
					$mails[$i]->save();
				 }
			  }
			foreach ( $_POST['Telefono'] as $i => $tel ) {
		    	$tels[$i] = new Telefono;  
		        if ( (isset( $_POST['Telefono'][$i] )) && ($_POST['Telefono'][$i]['numero'] <> '') ){//print_r($model); die();
		        	$tels[$i]->attributes=$_POST['Telefono'][$i];	
						if ( isset( $_POST['Telefono'][$i]['id']) ) 
							{$modelDetail = Telefono::model();
							 $tels[$i] = $this->loadModeldetail($_POST['Telefono'][$i]['id'], $modelDetail);}				            	
		            $tels[$i]->tipoid = $_POST['Telefono'][$i]['tipoid'];
					$tels[$i]->localidad = $_POST['Telefono'][$i]['localidad'];
					$tels[$i]->numero = $_POST['Telefono'][$i]['numero'];
					$tels[$i]->personaid = $model->id;	
					$valid = $valid && $tels[$i]->validate();  
					$tels[$i]->save();
				 }
			  }
			foreach ( $_POST['Direccion'] as $i => $dir ) {
		    	$dirs[$i] = new Direccion;  
		        if (( isset( $_POST['Direccion'][$i])) && ($_POST['Direccion'][$i]['calle'] <> '')) {//print_r($_POST['Direccion'][$i]); die();
		        	$dirs[$i]->attributes=$_POST['Direccion'][$i];	
					if ((isset( $_POST['Direccion'][$i]['id']) ) && ($_POST['Direccion'][$i]['id'] <> ''))  
							{$modelDetail = Direccion::model();
							 $dirs[$i] = $this->loadModeldetail($_POST['Direccion'][$i]['id'], $modelDetail);}          	
		            $dirs[$i]->tipodireccion = $_POST['Direccion'][$i]['tipodireccion'];
					$dirs[$i]->localidad = $_POST['Direccion'][$i]['localidad'];
					$dirs[$i]->numero = $_POST['Direccion'][$i]['numero'];
					$dirs[$i]->calle = $_POST['Direccion'][$i]['calle'];
					$dirs[$i]->persona_id = $model->id;	
					//$valid = $valid && $dirs[$i]->validate();  
					$dirs[$i]->save();
				 }
			  }
			if (isset($model->id))
				$this->redirect(array('view','id'=>$model->id));
			
		}

		$this->render('update',array(
					'model'=>$model, 'mails' => $mails,
					'tels' => $tels,
					'dirs' => $dirs,
					'dirsAgregados' => $dirsAgregados,
					'mailsAgregados' => $mailsAgregados,
					'telsAgregados' => $telsAgregados,  
				));

	}

 		public function loadModeldetail($id, $modelDetail)
        {
                $model=$modelDetail->findByPk((int)$id);
                if($model===null)
                        throw new CHttpException(404,'The requested page does not exist.');
                return $model;
        }


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
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
