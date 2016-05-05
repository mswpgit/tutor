<?php

namespace Content\Form;

use Zend\Form\Element;
use Base\Form\ProvidesEventsForm;
use Content\Options\MaterialOptionsInterface;
use Doctrine\ORM\EntityManager;

class Material extends ProvidesEventsForm
{
	/**
	 * @var MaterialOptionsInterface
	 */
	protected $materialOptions;

	protected $entityManager;

	public function __construct($name, MaterialOptionsInterface $materialOptions, EntityManager $entityManager)
	{
		$this->setMaterialOptions($materialOptions);
		$this->entityManager = $entityManager;

		parent::__construct($name);

		$this->add(array(
			'name' => 'title',
			'options' => array(
				'label' => 'Название',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));
		$this->add(array(
			'name' => 'alias',
			'options' => array(
				'label' => 'Алиас',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));
		$this->add(array(
			'name' => 'description',
			'options' => array(
				'label' => 'Описание',
			),
			'attributes' => array(
				'type' => 'textarea',
				'rows' => 5,
			),
		));
		$this->add(array(
			'name' => 'keywords',
			'options' => array(
				'label' => 'Ключевые слова',
			),
			'attributes' => array(
				'type' => 'textarea',
				'rows' => 3,
			),
		));
		$this->add(array(
			'name' => 'introtext',
			'options' => array(
				'label' => 'ИнфоТекст',
			),
			'attributes' => array(
				'type' => 'textarea',
				'rows' => 5,
			),
		));
		$this->add(array(
			'name' => 'content',
			'options' => array(
				'label' => 'Содержание',
			),
			'attributes' => array(
				'type' => 'textarea',
				'rows' => 8,
			),
		));
		$this->add(array(
			'name' => 'ordering',
			'options' => array(
				'label' => 'Порядок отображения',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));
		$element = new \DoctrineModule\Form\Element\ObjectSelect('categoryId');
		$element->setOptions(array(
			'label' => 'Категория',
			'object_manager' => $this->entityManager,
			'target_class'   => 'Content\Entity\Category',
			'property'       => 'title',
			'is_method'      => true,
			'find_method'    => array(
				'name'   => 'findBy',
				'params' => array(
					'criteria' => array(),
					'orderBy'  => array('title' => 'ASC'),
				),
			),
			'empty_option' => '',
		));
		$element->setAttribute('tableAlias', 'f');
		$this->add($element);
		$submitElement = new Element\Button('submit');
		$submitElement
			->setLabel('Создать')
			->setAttributes(array(
				'type'  => 'submit',
			));
		$this->add($submitElement, array(
			'priority' => -100,
		));
		$this->getEventManager()->trigger('init', $this);
	}

	/**
	 * Set Options
	 *
	 * @param MaterialOptionsInterface $materialOptions
	 * @return $this
	 */
	public function setMaterialOptions(MaterialOptionsInterface $materialOptions)
	{
		$this->materialOptions = $materialOptions;

		return $this;
	}

	/**
	 * Get Options
	 *
	 * @return MaterialOptionsInterface
	 */
	public function getMaterialOptions()
	{
		return $this->materialOptions;
	}
}
