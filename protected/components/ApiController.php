<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ApiController extends Controller
{
	protected function beforeAction($event)
    {
    	
        header('Content-type: application/json');
    	return parent::beforeAction($event);
    }
}