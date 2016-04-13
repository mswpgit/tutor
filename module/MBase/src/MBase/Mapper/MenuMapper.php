<?php

namespace MBase\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

use MBase\Mapper\AbstractMapper;

class MenuMapper extends AbstractMapper
{
	public function getItemById($id)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($this->options->getMenuEntityClass());

		return $repository->find($id);
	}

	/**
	 * @param  array $data
	 * @return \MBase\Entity\Menu
	 */
	public function findOneBy(array $data = array())
	{
		return $this->getEntityManager()->getRepository(
			$this->options->getMenuEntityClass()
		)->findBy($data);
	}

}
