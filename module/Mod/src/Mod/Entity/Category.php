<?php

namespace Mod\Entity;

use Doctrine\ORM\Mapping as ORM;

class Category
{
	/**
	 * @var integer
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var integer
	 */
	protected $parent_category;

	/**
	 * @var integer
	 */
	protected $child_categories;

	public function __construct()
	{
		$this->child_categories = new \Doctrine\Common\Collections\ArrayCollection;
	}

	public function setChildCategories($child_categories)
	{
		$this->child_categories = $child_categories;
	}

	public function getChildCategories()
	{
		return $this->child_categories;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setParentCategory($parent_category)
	{
		$this->parent_category = $parent_category;
	}

	public function getParentCategory()
	{
		return $this->parent_category;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

}