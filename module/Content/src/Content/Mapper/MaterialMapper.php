<?php

namespace Content\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\QueryBuilder;
use Base\Mapper\AbstractMapper;

class MaterialMapper extends AbstractMapper
{
	public function getAll()
	{
		return $this->getAllItems($this->options->getMaterialEntityClass());
	}

}