<?php

namespace Back\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MaterialController extends AbstractActionController
{
	public function indexAction()
	{
		/** @var $materialService \Content\Service\MaterialService */
		$materialService = $this->getServiceLocator()->get('materialService');

		$materialList = $materialService->getMaterialAll();
		if ($materialService->getMaterialAll())
		{
			/** @var $material \Content\Entity\Material */
			foreach ($materialService->getMaterialAll() as $material)
			{
				\Zend\Debug\Debug::dump($material->getTitle());
				/** @var $category \Content\Entity\Category */
				$category = $material->getCategory();
				\Zend\Debug\Debug::dump($category->getTitle());
			}
		}

		/** @var $categoryService \Content\Service\CategoryService */
		$categoryService = $this->getServiceLocator()->get('categoryService');

		if ($categoryService->getCategoryAll())
		{
			/** @var $category \Content\Entity\Category */
			foreach ($categoryService->getCategoryAll() as $category)
			{
				\Zend\Debug\Debug::dump($category->getTitle());

				$material = $category->getMaterial();
				if ($material)
				{
					/** @var $mat \Content\Entity\Material */
					foreach ($material as $mat)
					{
						\Zend\Debug\Debug::dump($mat->getTitle());
					}
				}
			}
		}

		return new ViewModel(
			array(
				'materialList' => $materialList,
			)
		);
	}

}
