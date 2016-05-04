<?php

namespace Content\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

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
	private $assetId;

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
	 * @var string
	 */
	private $keywords;

/**
	 * @var string
	 */
	private $introText;

	/**
	 * @var integer
	 */
	private $state;

	/**
	 * @var DateTime
	 */
	private $dateCreated;

	/**
	 * @var DateTime
	 */
	private $dateUpdated;

	/**
	 * @var string
	 */
	private $params;

	/**
	 * @var string
	 */
	private $metaData;

	/**
	 * @var string
	 */
	private $material;

	/**
	 * @param string $material
	 */
	public function setMaterial($material)
	{
		$this->material = $material;
	}

	/**
	 * @return string
	 */
	public function getMaterial()
	{
		return $this->material;
	}

	public function __construct()
	{
		$this->childCategories = new \Doctrine\Common\Collections\ArrayCollection;
		$this->material        = new \Doctrine\Common\Collections\ArrayCollection;
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
	 * @param int $assetId
	 */
	public function setAssetId($assetId)
	{
		$this->assetId = $assetId;
	}

	/**
	 * @return int
	 */
	public function getAssetId()
	{
		return $this->assetId;
	}

	/**
	 * @param \DateTime $dateCreated
	 */
	public function setDateCreated($dateCreated)
	{
		$this->dateCreated = $dateCreated;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateCreated()
	{
		return $this->dateCreated;
	}

	/**
	 * @param \DateTime $dateUpdated
	 */
	public function setDateUpdated($dateUpdated)
	{
		$this->dateUpdated = $dateUpdated;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateUpdated()
	{
		return $this->dateUpdated;
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
	 * @param string $introText
	 */
	public function setIntroText($introText)
	{
		$this->introText = $introText;
	}

	/**
	 * @return string
	 */
	public function getIntroText()
	{
		return $this->introText;
	}

	/**
	 * @param string $keywords
	 */
	public function setKeywords($keywords)
	{
		$this->keywords = $keywords;
	}

	/**
	 * @return string
	 */
	public function getKeywords()
	{
		return $this->keywords;
	}

	/**
	 * @param string $metaData
	 */
	public function setMetaData($metaData)
	{
		$this->metaData = $metaData;
	}

	/**
	 * @return string
	 */
	public function getMetaData()
	{
		return $this->metaData;
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
	 * @param int $state
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * @return int
	 */
	public function getState()
	{
		return $this->state;
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
