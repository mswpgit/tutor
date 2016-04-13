<?php
namespace MBase\Options;

interface ContentOptionsInterface
{
	/**
	 * @param string $contentEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setContentEntityClass($contentEntityClass);

	/**
	 * @return string
	 */
	public function getContentEntityClass();

}
