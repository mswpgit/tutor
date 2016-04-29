<?php

namespace Content\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\QueryBuilder;
use Base\Mapper\AbstractMapper;

class MenuMapper extends AbstractMapper
{
	/**
	 * @param $path
	 * @return ArrayCollection|mixed
	 */
	public function test($path)
	{
		/** @var $builder  QueryBuilder*/
		$builder = $this->getMapper()->getEntityManager()->createQueryBuilder();
		$select = $builder->select(array('m'))
			->from('Content\Entity\Menu', 'm')
			->where('m.path = :path')
			->setParameters(array(
				'path' => $path
			));
		$result = $select->getQuery()->execute();
		return $result;
	}

	public function getRootMenu()
	{
		return $this->getEntityManager()->getRepository(
			$this->options->getMenuEntityClass()
		)->findBy(array('parentMenu' => null));
	}

	public function getItemById($id)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($this->options->getMenuEntityClass());
		return $repository->find($id);
	}

}