<?php

namespace Mod\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Mod\Options\ModuleOptions;
use Mod\Mapper\AbstractMapper;
use Mod\Stdlib\Hydrator\DoctrineObjectDBAL;

class MenuMapper extends AbstractMapper
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
			->getRepository($this->options->getMenuEntityClass())
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
	 * @param \Mod\Mapper\EntityManager $entityManager
	 *
	 * @return $this
	 */
	public function setEntityManager($entityManager)
	{
		$this->entityManager = $entityManager;
		return $this;
	}

	/**
	 * @return \Mod\Mapper\EntityManager
	 */
	public function getEntityManager()
	{
		return $this->entityManager;
	}

	public function getItemById($id)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($this->options->getMenuEntityClass());

		return $repository->find($id);
	}

}
