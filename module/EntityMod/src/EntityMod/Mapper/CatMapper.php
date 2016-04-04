<?php

namespace EntityMod\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use EntityMod\Options\ModuleOptions;
use EntityMod\Mapper\AbstractMapper;
use EntityMod\Stdlib\Hydrator\DoctrineObjectDBAL;

class CatMapper extends AbstractMapper
{
	/**
	 * @var EntityManager
	 */
	protected $entityManager;

	/**
	 * @var ModuleOptions
	 */
	protected $options;

	/**
	 * @param $em
	 * @param ModuleOptions $options
	 */
	public function __construct($em, ModuleOptions $options)
	{
		$this->setEntityManager($em);
		$this->setOptions($options);
	}

	public function getAll(){
		return $this->getEntityManager()
			->getRepository($this->options->getCatEntityClass())
			->findAll();
	}

	/**
	 * @param mixed $options
	 *
	 * @return $this
	 */
	public function setOptions($options)
	{
		$this->options = $options;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * @param \EntityMod\Mapper\EntityManager $entityManager
	 *
	 * @return $this
	 */
	public function setEntityManager($entityManager)
	{
		$this->entityManager = $entityManager;
		return $this;
	}

	/**
	 * @return \EntityMod\Mapper\EntityManager
	 */
	public function getEntityManager()
	{
		return $this->entityManager;
	}

	public function getItemById($id)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($this->options->getCatEntityClass());
		return $repository->find($id);
	}

}
