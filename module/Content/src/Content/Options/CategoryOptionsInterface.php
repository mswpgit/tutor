<?php

namespace Content\Options;

interface CategoryOptionsInterface
{
	/**
	 * @param string $categoryEntityClass
	 * @return \Content\Options\ModuleOptions
	 */
	public function setCategoryEntityClass($categoryEntityClass);

	/**
	 * @return string
	 */
	public function getCategoryEntityClass();

}
