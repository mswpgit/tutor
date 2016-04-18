<?php

namespace MBase\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

use MBase\Mapper\AbstractMapper;

class ContentMapper extends AbstractMapper
{
	public function getAll()
	{
		return $this->getEntityManager()
			->getRepository($this->options->getContentEntityClass())
			->findAll();
	}

	public function getById($id)
	{
		return $this->getEntityManager()
			->getRepository($this->options->getContentEntityClass())
			->find($id);
	}

	public function getContentByAlias($alias)
	{
		return $this->getEntityManager()
			->getRepository($this->options->getContentEntityClass())
			->findOneBy(array('alias' => $alias, 'state' => 'published'));
	}

}
