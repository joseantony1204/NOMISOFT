<?php

class CatedraticosModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		Yii::app()->homeUrl = array('/catedraticos/');
		Yii::app()->user->setState('module',3);
		Yii::app()->name='NOMISOFT - CATEDRATICOS';
		$this->setImport(array(
			'catedraticos.models.*',
			'catedraticos.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
