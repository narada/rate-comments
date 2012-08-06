<?php
class Application_Form_CreatePostForm extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
		
        $id = $this->createElement('hidden','id');
        $username = $this->createElement('hidden','username');
        $createat = $this->createElement('hidden','createat');
        $lastupdate = $this->createElement('hidden','lastupdate');
        $title = $this->createElement('text','title');
        $title->setLabel('Title:')
        ->setAttrib('size',50);
        $post = $this->createElement('textarea','post');
        $post->setLabel('Description:')
        ->setAttrib('size',1000);
        $save = $this->createElement('submit','save');
        $save->setLabel("Save")
                ->setIgnore(true);

        $this->addElements(array(
            $id,
        	$title,
            $post,
        	$createat,
        	$lastupdate,
        	$username,
            $save
        ));
    }
}