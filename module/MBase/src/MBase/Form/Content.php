<?php

namespace MBase\Form;

use Zend\Form\Element;
use MBase\Form\ProvidesEventsForm;
use MBase\Options\ContentOptionsInterface;
use Doctrine\ORM\EntityManager;

class Content extends ProvidesEventsForm
{
	/**
	 * @var ContentOptionsInterface
	 */
	protected $contentOptions;

	protected $entityManager;

	public function __construct($name, ContentOptionsInterface $options, EntityManager $entityManager)
	{
		$this->setContentOptions($options);
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
				'type' => 'textarea'
			),
		));

		$this->add(array(
			'name' => 'keyword',
			'options' => array(
				'label' => 'Ключевые слова',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));

		$this->add(array(
			'name' => 'introtext',
			'options' => array(
				'label' => 'ИнфоТекст',
			),
			'attributes' => array(
				'type' => 'textarea'
			),
		));


		$this->add(array(
			'name' => 'fulltext',
			'options' => array(
				'label' => 'Текст',
			),
			'attributes' => array(
				'type' => 'textarea'
			),
		));

//		$this->add(array(
//			'name' => 'state',
//			'options' => array(
//				'label' => 'Опубликовать',
//			),
//			'attributes' => array(
//				'type' => 'checkbox'
//			),
//		));


		$this->add(array(
			'name' => 'params',
			'options' => array(
				'label' => 'параметры',
			),
			'attributes' => array(
				'type' => 'textarea'
			),
		));

		$element = new \DoctrineModule\Form\Element\ObjectSelect('categoryId');
		$element->setOptions(array(
			'label' => 'Регион',
			'object_manager' => $this->entityManager,
			'target_class'   => 'MBase\Entity\Category',
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
	 * @param ContentOptionsInterface $contentOptions
	 * @return Content
	 */
	public function setContentOptions(ContentOptionsInterface $contentOptions)
	{
		$this->contentOptions = $contentOptions;
		return $this;
	}

	/**
	 * Get Options
	 *
	 * @return ContentOptionsInterface
	 */
	public function getContentOptions()
	{
		return $this->contentOptions;
	}
}
