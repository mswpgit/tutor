<?php
namespace ModForm\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Zend\Form\Form;

use ModForm\Form\CategoryFilter;

class CategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new CategoryFilter());

        //Input name
        $name = new Text('name');
	    $name->setLabel('Название')
            ->setAttributes(array(
                    'maxlength' => 45
                ));
        $this->add($name);

		// Button submit
        $button = new Button('submit');
        $button->setLabel('Добавить')
            ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn'
                ));
        $this->add($button);
    }

}