<?php

namespace Mod\Service;

class MenuService extends AbstractService
{
	/**
	 * @var  \Mod\Mapper\MenuMapper
	 */
	protected $mapper;

	public function __construct($mapper)
	{
		$this->setMapper($mapper);
	}

	/**
	 * @param \Mod\Mapper\MenuMapper $mapper
	 *
	 * @return $this
	 */
	public function setMapper($mapper)
	{
		$this->mapper = $mapper;
		return $this;
	}

	/**
	 * @return \Mod\Mapper\MenuMapper
	 */
	public function getMapper()
	{
		return $this->mapper;
	}

}
