<?php
class Application_Form_CreatePostForm extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $id = $this->createElement('hidden','id');
        $title = $this->createElement('text','title');
        $title->setLabel('Title:')
        ->setAttrib('size',100);
        $description = $this->createElement('textarea','description');
        $description->setLabel('Description:')
        ->setAttrib('size',50);
        $save = $this->createElement('submit','save');
        $save->setLabel("Save")
                ->setIgnore(true);

        $this->addElements(array(
            $title,
            $description,
            $id,
            $save
        ));
    }
}