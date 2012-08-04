<?php

class Application_Form_LoginForm extends Zend_Form
{
	public function init()
	{
		$username = $this->createElement('text','username');
		$username->setLabel('Username: *')
		->setRequired(true);

		$password = $this->createElement('password','password');
		$password->setLabel('Password: *')
		->setRequired(true);

		$signin = $this->createElement('submit','signin');
		$signin->setLabel('Sign in')
		->setIgnore(true);

		$this->addElements(array(
				$username,
				$password,
				$signin,
		));
	}
}