<?php

namespace ModForm\Entity;

use ModForm\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="page", indexes={@ORM\Index(name="fk_page_category_idx", columns={"category"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="ModForm\Entity\Repository\PageRepository")
 */
class Page extends AbstractEntity
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

	/**
     * @var string
     *
     * @ORM\Column(name="kword", type="string", length=255, nullable=true)
     */
    private $kword;

	/**
     * @var string
     *
     * @ORM\Column(name="dword", type="string", length=255, nullable=true)
     */
    private $dword;

	/**
     * @var string
     *
     * @ORM\Column(name="fulltext", type="text", nullable=false)
     */
    private $fulltext;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="active", type="boolean", nullable=false)
	 */
	private $active = '0';

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_create", type="datetime", nullable=true)
	 */
	private $date_create;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published = '0';

    /**
     * @var \ModForm\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="ModForm\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * Set category
     *
     * @param \ModForm\Entity\Category $category
     *
     * @return Menu
     */
    public function setCategory(\ModForm\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ModForm\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

	/**
	 *
	 */
	public function setDateCreate()
	{
		$this->date_create = new \DateTime('now');
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateCreate()
	{
		return $this->date_create;
	}

	/**
	 * @param string $dword
	 */
	public function setDword($dword)
	{
		$this->dword = $dword;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDword()
	{
		return $this->dword;
	}

	/**
	 * @param string $fulltext
	 */
	public function setFulltext($fulltext)
	{
		$this->fulltext = $fulltext;
		return $this;
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
	 * @param string $kword
	 */
	public function setKword($kword)
	{
		$this->kword = $kword;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getKword()
	{
		return $this->kword;
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

	/**
	 * Set active
	 *
	 * @param boolean $ativo
	 *
	 * @return Page
	 */
	public function setActive($active)
	{
		$this->active = $active;

		return $this;
	}

	/**
	 * Get active
	 *
	 * @return boolean
	 */
	public function getActive()
	{
		return $this->active;
	}
}
