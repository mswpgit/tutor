<?php

namespace Application\Service;

use Application\Entity\Menu;

/**
 * Handles interaction with pages
 * Ручки взаимодействия со страницами
 */
class MenuService
{
	private $entityManager;

	private $menuRepository;

	public function __construct($entityManager)
	{
		$this->entityManager = $entityManager;
		$this->menuRepository = $this->entityManager->getRepository('Application\Entity\Menu');
	}

	/**
	 * @param string $menu_id
	 * @return \Application\Entity\Menu
	 */
	public function getMenu($menu_id)
	{
		return $this->menuRepository->find($menu_id);
	}

	public function getFullList()
	{
		return $this->menuRepository->findAll();
	}

	public function getRepository()
	{
		return $this->menuRepository;
	}

}