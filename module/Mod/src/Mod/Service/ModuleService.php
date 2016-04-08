<?php

namespace Mod\Service;

use Mod\Mapper\MenuMapper as MenuMapper;

class ModuleService extends AbstractService
{
	/**
	 * @var  \Mod\Mapper\ModuleMapper
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
