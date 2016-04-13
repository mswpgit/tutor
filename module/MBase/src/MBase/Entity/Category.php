<?php

namespace MBase\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var integer
	 */
	private $parentCategory;

	/**
	 * @var integer
	 */
	private $childCategories;

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @var string
	 */
	private $extension;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $alias;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var boolean
	 */
	private $published;

	/**
	 * @var string
	 */
	private $metadesc;


	/**
	 * @var string
	 */
	private $metakey;

	/**
	 * @var string
	 */
	private $params;

	/**
	 * @var string
	 */
	private $content;

	/**
	 * @param string $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	public function __construct()
	{
		$this->childCategories = new \Doctrine\Common\Collections\ArrayCollection;
		$this->content         = new \Doctrine\Common\Collections\ArrayCollection;
	}

	public function setChildCategories($childCategories)
	{
		$this->childCategories = $childCategories;
	}

	public function getChildCategories()
	{
		return $this->childCategories;
	}

	/**
	 * @param string $alias
	 */
	public function setAlias($alias)
	{
		$this->alias = $alias;
	}

	/**
	 * @return string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $extension
	 */
	public function setExtension($extension)
	{
		$this->extension = $extension;
	}

	/**
	 * @return string
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $metadesc
	 */
	public function setMetadesc($metadesc)
	{
		$this->metadesc = $metadesc;
	}

	/**
	 * @return string
	 */
	public function getMetadesc()
	{
		return $this->metadesc;
	}

	/**
	 * @param string $metakey
	 */
	public function setMetakey($metakey)
	{
		$this->metakey = $metakey;
	}

	/**
	 * @return string
	 */
	public function getMetakey()
	{
		return $this->metakey;
	}

	/**
	 * @param string $params
	 */
	public function setParams($params)
	{
		$this->params = $params;
	}

	/**
	 * @return string
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param int $parentCategory
	 */
	public function setParentCategory($parentCategory)
	{
		$this->parentCategory = $parentCategory;
	}

	/**
	 * @return int
	 */
	public function getParentCategory()
	{
		return $this->parentCategory;
	}

	/**
	 * @param string $path
	 */
	public function setPath($path)
	{
		$this->path = $path;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param boolean $published
	 */
	public function setPublished($published)
	{
		$this->published = $published;
	}

	/**
	 * @return boolean
	 */
	public function getPublished()
	{
		return $this->published;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}


}