<?php

namespace Mod\Mapper;

use Doctrine\ORM\EntityManager;

abstract class AbstractMapper
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
		$this->options = $options;
	}

	/**
	 * @param \Doctrine\ORM\EntityManager $entityManager
	 */
	public function setEntityManager(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager()
	{
		return $this->entityManager;
	}


	/**
	 * @param array $options
	 * @return mixed
	 */
	public function beginTransaction(array $options = array())
	{
		$this->getEntityManager()->beginTransaction();
	}

	/**
	 * @param array $options
	 * @return mixed
	 */
	public function commit(array $options = array())
	{
		$this->getEntityManager()->commit();
	}

	/**
	 * @param array $options
	 * @return mixed
	 */
	public function rollback(array $options = array())
	{
		$this->getEntityManager()->rollback();
	}

	/**
	 * save
	 *
	 * @param mixed $entity
	 * @return mixed
	 * @access public
	 */
	public function save($entity)
	{
		$this->getEntityManager()->persist($entity);
		$this->getEntityManager()->flush();
		return $entity;
	}

	/**
	 * persist
	 *
	 * @param mixed $entity
	 * @return mixed
	 * @access public
	 */
	public function persist($entity)
	{
		$this->getEntityManager()->persist($entity);
		return $entity;
	}

	/**
	 * @param array $params
	 * @param       $repository
	 * @internal param bool $onlyOne
	 *
	 * @return array|object
	 */
	public function findItemByParams($params, $repository)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($repository);
		return $repository->findOneBy($params);
	}

	/**
	 * @param array $params
	 * @param       $repository
	 * @internal param bool $onlyOne
	 *
	 * @return array|object
	 */
	public function findItemsByParams($params, $repository)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($repository);
		return $repository->findAll($params);
	}

	public function getItemById($id, $repository)
	{
		$em = $this->getEntityManager();
		$repository = $em->getRepository($repository);
		return $repository->find($id);
	}

}
