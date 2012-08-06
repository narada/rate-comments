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
		$posts = new Application_Model_DbTable_Posts();
		$data  = $posts->fetchAll();
		$this->view->data = $data->toArray();		
	}
	
	public function createAction() {
		$storage = new Zend_Auth_Storage_Session();
		$data = $storage->read();
		if ($data) {
			$posts = new Application_Model_DbTable_Posts();
			$form = new Application_Form_CreatePostForm();
			$this->view->form = $form;
			if ($this->getRequest()->isPost()) {
				$formData  = $this->_request->getPost();
				var_dump($formData);
				// 			echo $data;
				if ($form->isValid($formData)) {
					// 				$posts->insert($formData);
					// 				$this->_redirect('post');
				}
			}			
		} else {
			$this->_redirect('auth/login');
		}
			
	}
	
	public function showAction() {
		// TODO Auto-generated PostController::indexAction() default action
		$posts = new Application_Model_DbTable_Posts();
		$data  = $posts->fetchAll();
		$this->view->data = $data->toArray();
	}
	
}
