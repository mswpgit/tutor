<?php
namespace MBase\Options;

interface CategoryOptionsInterface
{
	/**
	 * @param string $categoryEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setCategoryEntityClass($categoryEntityClass);

	/**
	 * @return string
	 */
	public function getCategoryEntityClass();

}
