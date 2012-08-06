<?php

class AuthController extends Zend_Controller_Action
{   
    public function homeAction()
    {
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        if(!$data){
            $this->_redirect('auth/login');
        }
        $this->view->username = $data->username;                
    }
    
    public function loginAction()
    {
        $users = new Application_Model_DbTable_Users();
        $form = new Application_Form_LoginForm();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($_POST)){
                $data = $form->getValues();
                $auth = Zend_Auth::getInstance();
                $authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter(),'users');
                $authAdapter->setIdentityColumn('username')
                            ->setCredentialColumn('password');
                $authAdapter->setIdentity($data['username'])
                            ->setCredential($data['password']);
                $result = $auth->authenticate($authAdapter);
                if($result->isValid()){
                    $storage = new Zend_Auth_Storage_Session();
                    $storage->write($authAdapter->getResultRowObject());
                    $this->_redirect('auth/home');
                } else {
                    $this->view->errorMessage = "Invalid username or password. Please try again.";
                }
            }
        }
    }
    
    public function getDbTable()
    {
    	if (null === $this) {
    		$this->setDbTable('Application_Model_DbTable_Users');
    	}
    	return $this;
    }    
    
    public function signupAction()
    {
        $users = new Application_Model_DbTable_Users();
        $form = new Application_Form_RegistrationForm();
        $this->view->form=$form;

    		if ($this->getRequest()->isPost()) {
			$formData  = $this->_request->getPost();
				
			if ($form->isValid($formData)) {			     
				if ($formData['password'] != $formData['password2']) {
					$this->view->errorMsg = "Password and Confirm Password must match.";
					$this->render('signup');
					return;
				}
				unset($formData['password2']);
				unset($formData['register']);				
				$users->insert($formData);
                $this->_redirect('auth/login');
            }
        }
    }
        
    public function logoutAction()
    {
        $storage = new Zend_Auth_Storage_Session();
        $storage->clear();
        $this->_redirect('auth/login');
    }
}

?>