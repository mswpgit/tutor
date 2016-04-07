<?php

namespace Mod\Form;

use Zend\Form\Element;
use Base\Form\ProvidesEventsForm;
use Mod\Options\AuthenticationOptionsInterface;

class Login extends ProvidesEventsForm
{
	/**
	 * @var AuthenticationOptionsInterface
	 */
	protected $moduleOptions;

	public function __construct($name, AuthenticationOptionsInterface $options)
	{
		$this->setMenuOptions($options);
		parent::__construct($name);

		$this->add(array(
			'name' => 'email',
			'options' => array(
				'label' => 'Логин',
			),
			'attributes' => array(
				'type' => 'text'
			),
		));

		$this->add(array(
			'name' => 'password',
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
			->setLabel('Войти')
			->setAttributes(array(
				'type'  => 'submit',
			));

		$this->add($submitElement, array(
			'priority' => -100,
		));

		$this->getEventManager()->trigger('init', $this);
	}

	/**
	 * Set Login-related Options
	 *
	 * @param AuthenticationOptionsInterface $loginOptions
	 * @return Login
	 */
	public function setMenuOptions(AuthenticationOptionsInterface $loginOptions)
	{
		$this->moduleOptions = $loginOptions;
		return $this;
	}

	/**
	 * Get Login-related Options
	 *
	 * @return AuthenticationOptionsInterface
	 */
	public function getMenuOptions()
	{
		return $this->moduleOptions;
	}
}
