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
			'name' => 'identity',
			'options' => array(
				'label' => '',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));

//		$emailElement = $this->get('identity');
//		$label = $emailElement->getLabel('label');
//		// @TODO: make translation-friendly
//		foreach ($this->getMenuOptions()->getAuthIdentityFields() as $mode) {
//			$label = (!empty($label) ? $label . ' or ' : '') . ucfirst($mode);
//		}
//		$emailElement->setLabel($label);
		//
		$this->add(array(
			'name' => 'credential',
			'type' => 'password',
			'options' => array(
				'label' => 'Password',
			),
			'attributes' => array(
				'type' => 'password',
			),
		));

		$submitElement = new Element\Button('submit');
		$submitElement
			->setLabel('Sign In')
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
