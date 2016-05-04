<?php

namespace Content\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Material
 */
class Material
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
	 * @var
	 */
	private $category;

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
	private $introText;

	/**
	 * @var string
	 */
	private $content;

	/**
	 * @var string
	 */
	private $keywords;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var integer
	 */
	private $state;

	/**
	 * @var integer
	 */
	private $ordering;

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
	 * @param  $category
	 */
	public function setCategory($category)
	{
		$this->category = $category;
	}

	/**
	 * @return
	 */
	public function getCategory()
	{
		return $this->category;
	}

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

	/**
	 * @param string $dateCreated
	 */
	public function setDateCreated($dateCreated)
	{
		$this->dateCreated = $dateCreated;
	}

	/**
	 * @return DateTime
	 */
	public function getDateCreated()
	{
		return $this->dateCreated;
	}

	/**
	 * @param string $dateUpdated
	 */
	public function setDateUpdated($dateUpdated)
	{
		$this->dateUpdated = $dateUpdated;
	}

	/**
	 * @return DateTime
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
	 * @param int $ordering
	 */
	public function setOrdering($ordering)
	{
		$this->ordering = $ordering;
	}

	/**
	 * @return int
	 */
	public function getOrdering()
	{
		return $this->ordering;
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
