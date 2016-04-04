<?php

namespace EntityMod\Mapper;

class CatMapper
{
	/**
	 * @var EntityManager
	 */
	protected $entityManager;

	/**
	 * @var
	 */
	protected $options;

	/**
	 * @param $em
	 * @param $options
	 */
	public function __construct($em,$options)
	{
		$this->setEntityManager($em);
		$this->setOptions($options);
	}

	public function getAll(){
		return $this->getEntityManager()
			->getRepository($this->options['catEntityClass'])
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
		\Zend\Debug\Debug::dump($entityManager);
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

}
