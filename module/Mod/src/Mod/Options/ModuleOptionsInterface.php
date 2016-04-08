<?php
namespace Mod\Options;

interface ModuleOptionsInterface
{
	/**
	 * @param string $moduleEntityClass
	 * @return \Mod\Options\ModuleOptions
	 */
	public function setModuleEntityClass($moduleEntityClass);

	/**
	 * @return string
	 */
	public function getModuleEntityClass();

}
