<?php

namespace MBase\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 */
class Content
{
	/**
	 * @var integer
	 */
	private $id;

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
	private $state;

	/**
	 * @var string
	 */
	private $introtext;

	/**
	 * @var string
	 */
	private $fulltext;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $keyword;

	/**
	 * @var integer
	 */
	private $ordering;

	/**
	 * @var string
	 */
	private $params;

	/**
	 * @var integer
	 */
	private $category;

	/**
	 * @param int $category
	 */
	public function setCategory($category)
	{
		$this->category = $category;
	}

	/**
	 * @return int
	 */
	public function getCategory()
	{
		return $this->category;
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
	 * @param string $fulltext
	 */
	public function setFulltext($fulltext)
	{
		$this->fulltext = $fulltext;
	}

	/**
	 * @return string
	 */
	public function getFulltext()
	{
		return $this->fulltext;
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
	 * @param string $introtext
	 */
	public function setIntrotext($introtext)
	{
		$this->introtext = $introtext;
	}

	/**
	 * @return string
	 */
	public function getIntrotext()
	{
		return $this->introtext;
	}

	/**
	 * @param string $keyword
	 */
	public function setKeyword($keyword)
	{
		$this->keyword = $keyword;
	}

	/**
	 * @return string
	 */
	public function getKeyword()
	{
		return $this->keyword;
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
	 * @param string $state
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * @return string
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