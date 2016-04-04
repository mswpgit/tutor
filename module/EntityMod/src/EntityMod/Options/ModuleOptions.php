<?php
namespace EntityMod\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
	/**
	 * @var string
	 */
	protected $catEntityClass = 'EntityMod\Entity\Cat';

	/**
	 * @param string $catEntityClass
	 * @return \EntityMod\Options\ModuleOptions
	 */
	public function setCatEntityClass($catEntityClass)
	{
		$this->catEntityClass = $catEntityClass;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCatEntityClass()
	{
		return $this->catEntityClass;
	}

}
