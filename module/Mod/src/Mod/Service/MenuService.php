<?php

namespace Mod\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use Mod\Mapper\MenuMapper as MenuMapper;

class MenuService extends AbstractService
{
	/**
	 * @var  \Mod\Mapper\MenuMapper
	 */
	protected $mapper;

	/**
	 * @var Form
	 */
	protected $menuForm;

	/**
	 * @var Hydrator\ClassMethods
	 */
	protected $formHydrator;

	public function __construct($mapper)
	{
		$this->setMapper($mapper);
	}

	/**
	 * @param \Mod\Mapper\MenuMapper $mapper
	 *
	 * @return $this
	 */
	public function setMapper($mapper)
	{
		$this->mapper = $mapper;
		return $this;
	}

	/**
	 * @return \Mod\Mapper\MenuMapper
	 */
	public function getMapper()
	{
		return $this->mapper;
	}

	/**
	 * createFromForm
	 *
	 * @param array $data
	 * @return \Mod\Entity\UserInterface
	 *
	 */
	public function createdMenu(array $data)
	{
		$class = $this->getMapper()->getOptions()->getMenuEntityClass();
		$menuObj  = new $class;

		$form  = $this->getMenuForm();

		$form->setHydrator($this->getFormHydrator());
		$form->setData($data);
		$form->bind($menuObj);

		// чтобы проставить $form->hasValidated = true; иначе в $form->getData(); ошибка
		if (!$form->isValid())
		{
			return false;
		}

		$menu = $form->getData();
		$menu->setIsActive(true);

		$this->getMapper()->save($menu);

		return $menu;
	}

	public function getMenuForm()
	{
		if (null === $this->menuForm)
		{
			$this->menuForm = $this->getServiceManager()->get('menu_form');
		}
		return $this->menuForm;
	}

	/**
	 * @param Form $menuForm
	 * @return Menu
	 */
	public function setMenuForm(Form $menuForm)
	{
		$this->menuForm = $menuForm;
		return $this;
	}

	/**
	 * Return the Form Hydrator
	 *
	 * @return \Zend\Stdlib\Hydrator\ClassMethods
	 */
	public function getFormHydrator()
	{
		if (!$this->formHydrator instanceof Hydrator\HydratorInterface) {
			$this->setFormHydrator($this->getServiceManager()->get('form_hydrator'));
		}

		return $this->formHydrator;
	}

	/**
	 * Set the Form Hydrator to use
	 *
	 * @param Hydrator\HydratorInterface $formHydrator
	 * @return Menu
	 */
	public function setFormHydrator(Hydrator\HydratorInterface $formHydrator)
	{
		$this->formHydrator = $formHydrator;
		return $this;
	}

}
