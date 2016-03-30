<?php
namespace ModForm\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

use ModForm\Form\PageFilter;

class PostForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);

        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');

        //Input Titulo
        $titulo = new Text('title');
        $titulo->setLabel('Тайтл')
            ->setAttributes(array(
                    'maxlength' => 80
                ));
        $this->add($titulo);

        //Input Descrição
        $descricao = new Textarea('dword');
        $descricao->setLabel('Описание')
            ->setAttributes(array(
                    'maxlength' => 150
                ));
        $this->add($descricao);

        //Input Titulo
        $texto = new Textarea('fulltext');
        $texto->setLabel('Текст');
        $this->add($texto);

        $ativo = new Checkbox('active');
        $ativo->setLabel('Активно');
        $this->add($ativo);

        $categoria = new ObjectSelect('category');
        $categoria->setLabel('Категория')
            ->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'ModForm\Entity\Category',
                'property'       => 'name',
                'empty_option'   => '--Selecione--',
                'is_method'      => true,
                'find_method'    => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy'  => array('name' => 'ASC'),
                    ),
                ),
            ));
        $this->add($categoria);


        //Botao submit
        $button = new Button('submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn'
                ));
        $this->add($button);

        $this->setInputFilter(new PageFilter($categoria->getValueOptions()));
    }

    /**
     * Set the object manager
     *
     * @param ObjectManager $objectManager
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Get the object manager
     *
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }
}