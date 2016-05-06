<?php

namespace Content\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use Content\Mapper\MaterialMapper;
use Content\Entity;
use Base\Service\AbstractService;

class MaterialService extends AbstractService
{
	/**
	 * @var  MaterialMapper
	 */
	protected $mapper;

	public function getMaterialAll()
	{
		return $this->getMapper()->getAll();
	}

	/**
	 * @param  array $data
	 * @return Entity\Material
	 */
	public function create(array $data)
	{
		/** @var $material \Content\Entity\Material */
		$material = $this->getMapper()->create($data);

		if (!empty($data['categoryId']))
		{
			/** @var $categoryService \Content\Service\CategoryService */
			$categoryService = $this->getServiceManager()->get('categoryService');

			$material->setCategory($categoryService->getCategoryById($data['categoryId']));
		}

		$nowDate = new \DateTime();
		$material->setDateCreated($nowDate);
		$material->setDateUpdated($nowDate);

		$this->getMapper()->save($material);

		return $material;
	}

	/**
	 * @param  integer $id
	 * @param  array   $data
	 * @return Entity\Material
	 */
	public function update($id, array $data)
	{

	}

}
