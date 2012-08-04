<?php

/**
 * PostController
 * 
 * @author
 * @version 
 */

require_once 'Zend/Controller/Action.php';
class PostController extends Zend_Controller_Action {
	/**
	 * The default action - show the home page
	 */
	public function indexAction() {
		// TODO Auto-generated PostController::indexAction() default action
	}
	
	public function createAction() {
		
		$posts = new Application_Model_DbTable_Posts();
		$form = new Application_Form_CreatePostForm();
		$this->view->form = $form;
				
	}
}
