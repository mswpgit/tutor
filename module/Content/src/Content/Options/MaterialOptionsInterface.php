<?php

namespace Content\Options;

interface MaterialOptionsInterface
{
	/**
	 * @param string $materialEntityClass
	 * @return \Content\Options\ModuleOptions
	 */
	public function setMaterialEntityClass($materialEntityClass);

	/**
	 * @return string
	 */
	public function getMaterialEntityClass();

}
