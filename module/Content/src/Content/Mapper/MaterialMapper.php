<?php

namespace Content\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\QueryBuilder;
use Base\Mapper\AbstractMapper;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Content\Entity;

class MaterialMapper extends AbstractMapper
{
	public function getAll()
	{
		return $this->getAllItems($this->options->getMaterialEntityClass());
	}

	/**
	 * @param  array  $data
	 * @return Entity\Material
	 */
	public function create(array $data = array())
	{
		$entityClass = $this->options->getMaterialEntityClass();

		return $this->mergeFromArray(new $entityClass, $data);
	}

	/**
	 * @param  array $data
	 * @param  Entity\Material $material
	 * @return Entity\Material
	 */
	public function mergeFromArray(Entity\Material $material, array $data)
	{
		$hydrator = new DoctrineObject(
			$this->getEntityManager(), $this->options->getMaterialEntityClass()
		);

		return $hydrator->hydrate($data, $material);
	}

	public function save(Entity\Material $material)
	{
		$this->getEntityManager()->persist($material);
		$this->getEntityManager()->flush();

//		$this->getEventManager()->trigger('...',
//			null,
//			array(
//				'id' => ...,
//			)
//		);

		return $material;
	}

}
