<?php
class Application_Form_RegistrationForm extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $id = $this->createElement('hidden','id');
        $firstname = $this->createElement('text','firstName');
        $firstname->setLabel('First Name:')
                    ->setAttrib('size',50);
        $lastname = $this->createElement('text','lastName');
        $lastname->setLabel('Last Name:')
                ->setAttrib('size',50);
        $username = $this->createElement('text','username');
        $username->setLabel('Username:')
                ->setAttrib('size',50);
        $email = $this->createElement('text','email');
        $email->setLabel('Email:')
                ->setAttrib('size',50);
        $password = $this->createElement('password','password');
        $password->setLabel('Password:')
                    ->setAttrib('size',50);

        $password2 = $this->createElement('password','password2');
        $password2->setLabel('Confirm Password::')
                    ->setAttrib('size',50);
        $register = $this->createElement('submit','register');
        $register->setLabel("Register")
                ->setIgnore(true);

        $this->addElements(array(
            $firstname,
            $lastname,
            $username,
            $email,
            $password,
            $password2,
            $id,
            $register
        ));
    }
}