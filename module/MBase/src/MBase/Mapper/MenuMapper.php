<?php

namespace MBase\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\QueryBuilder;

use MBase\Mapper\AbstractMapper;

class MenuMapper extends AbstractMapper
{
	public function getItemById($id)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($this->options->getMenuEntityClass());

		return $repository->find($id);
	}

//	/**
//	 * @param  array $data
//	 * @return \MBase\Entity\Menu
//	 */
//	public function findOneBy(array $data = array())
//	{
//		return $this->getEntityManager()->getRepository(
//			$this->options->getMenuEntityClass()
//		)->findBy($data);
//	}

	public function getMenuByPath($path)
	{
		return $this->getEntityManager()->getRepository(
			$this->options->getMenuEntityClass()
		)->findOneBy(array('path' => $path, 'published' => 1));
	}

	public function getMenuIsDefault()
	{
		return $this->getEntityManager()->getRepository(
			$this->options->getMenuEntityClass()
		)->findOneBy(array('home' => 1));
	}

	public function getRootMenu()
	{
		return $this->getEntityManager()->getRepository(
			$this->options->getMenuEntityClass()
		)->findBy(array('parentMenu' => null));
	}

	public function getMenuType($menuType)
	{
		return $this->getEntityManager()->getRepository(
			$this->options->getMenuEntityClass()
		)->findBy(array('menuType' => $menuType, 'published' => 1));
	}

	/**
	 * @param $path
	 * @return ArrayCollection|mixed
	 */
	public function test($path)
	{

		/** @var $builder  QueryBuilder*/
		$builder = $this->getMapper()->getEntityManager()->createQueryBuilder();
		$select = $builder->select(array('m'))
			->from('MBase\Entity\Menu', 'm')
			->where('m.path = :path')
			->setParameters(array(
				'path' => $path
			));

		$result = $select->getQuery()->execute();

		return $result;
	}

}
