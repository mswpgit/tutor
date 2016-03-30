<?php
namespace ModForm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity Class Test
 * @ORM\Entity
 * @ORM\Table(name="test")
 * @property int $id
 * @property string $title
 * @property string $text
 */
class Test
{
	/**
	 * Primary Identifier
	 *
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 * @access protected
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 * @access protected
	 */
	protected $title;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 * @access protected
	 */
	protected $text;

	/**
	 * @param int $id
	 * @access public
	 * @return Test
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $title
	 * @access public
	 * @return Test
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $text
	 * @access public
	 * @return Test
	 */
	public function setText($text)
	{
		$this->text = $text;
		return $this;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}
}