<?php

namespace ModForm\Entity;

use ModForm\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="ModForm\Entity\Repository\MenuRepository")
 */
class Menu extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="menutype", type="string", length=25, nullable=false)
     */
    private $menutype;

	/**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

	/**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    private $alias;

	/**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=1024, nullable=true)
     */
    private $path;

	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=1024, nullable=true)
     */
    private $link;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="parent_id", type="integer", length=10, nullable=true)
	 */
	private $parent_id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="level", type="integer", length=10, nullable=true)
	 */
	private $level;

	/**
     * @var string
     *
     * @ORM\Column(name="lft", type="integer", length=11, nullable=true)
     */
    private $lft;


	/**
     * @var string
     *
     * @ORM\Column(name="rgt", type="integer", length=11, nullable=true)
     */
    private $rgt;

	/**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=11, nullable=true)
     */
    private $params;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published = '0';

	/**
	 * @param string $alias
	 */
	public function setAlias($alias)
	{
		$this->alias = $alias;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $level
	 */
	public function setLevel($level)
	{
		$this->level = $level;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @param string $lft
	 */
	public function setLft($lft)
	{
		$this->lft = $lft;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLft()
	{
		return $this->lft;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link)
	{
		$this->link = $link;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * @param string $menutype
	 */
	public function setMenutype($menutype)
	{
		$this->menutype = $menutype;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMenutype()
	{
		return $this->menutype;
	}

	/**
	 * @param string $params
	 */
	public function setParams($params)
	{
		$this->params = $params;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param string $parent_id
	 */
	public function setParentId($parent_id)
	{
		$this->parent_id = $parent_id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getParentId()
	{
		return $this->parent_id;
	}

	/**
	 * @param string $path
	 */
	public function setPath($path)
	{
		$this->path = $path;
		return $this;
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
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function getPublished()
	{
		return $this->published;
	}

	/**
	 * @param string $rgt
	 */
	public function setRgt($rgt)
	{
		$this->rgt = $rgt;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRgt()
	{
		return $this->rgt;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

}
