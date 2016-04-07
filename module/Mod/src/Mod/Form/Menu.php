<?php

namespace Mod\Form;

use Zend\Form\Element;
use Base\Form\ProvidesEventsForm;
use Mod\Options\MenuServiceInterface;

class Menu extends ProvidesEventsForm
{
	/**
	 * @var MenuServiceInterface
	 */
	protected $moduleOptions;

	public function __construct($name, MenuServiceInterface $options)
	{
		$this->setMenuOptions($options);
		parent::__construct($name);

		$this->add(array(
			'name' => 'menuType',
			'options' => array(
				'label' => 'Тип меню',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));

		$this->add(array(
			'name' => 'title',
			'options' => array(
				'label' => 'Название',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));

//		$this->add(array(
//			'name' => 'currency',
//			'type' => 'Select',
//			'required' => true,
//			'options' => array(
//				'value_options' => array(
//					643 => "RUB",
//					840 => "USD",
//					978 => "EUR"
//				)
//			),
//			'attributes' => array(
//				'required' => true,
//				'value' => 'RUR',
//			)
//		));

		$this->add(array(
			'name' => 'description',
			'options' => array(
				'label' => 'Описание',
			),
			'attributes' => array(
				'type' => 'textarea'
			),
		));

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
	 * Set Menu-related Options
	 *
	 * @param MenuServiceInterface $menuOptions
	 * @return Menu
	 */
	public function setMenuOptions(MenuServiceInterface $menuOptions)
	{
		$this->moduleOptions = $menuOptions;
		return $this;
	}

	/**
	 * Get Menu-related Options
	 *
	 * @return MenuServiceInterface
	 */
	public function getMenuOptions()
	{
		return $this->moduleOptions;
	}
}
