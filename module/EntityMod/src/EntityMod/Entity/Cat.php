<?php

namespace EntityMod\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cat
 */
class Cat
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var \DateTime
	 */
	private $dateTime;

	/**
	 * @var boolean
	 */
	private $isBool;

	/**
	 * @var string
	 */
	private $string;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set dateTime
	 *
	 * @param \DateTime $dateTime
	 * @return Cat
	 */
	public function setDateTime($dateTime)
	{
		$this->dateTime = $dateTime;

		return $this;
	}

	/**
	 * Get dateTime
	 *
	 * @return \DateTime
	 */
	public function getDateTime()
	{
		return $this->dateTime;
	}

	/**
	 * Set isBool
	 *
	 * @param boolean $isBool
	 * @return Cat
	 */
	public function setIsBool($isBool)
	{
		$this->isBool = $isBool;

		return $this;
	}

	/**
	 * Get isBool
	 *
	 * @return boolean
	 */
	public function getIsBool()
	{
		return $this->isBool;
	}

	/**
	 * Set number
	 *
	 * @param string $string
	 * @return Cat
	 */
	public function setString($string)
	{
		$this->string = $string;

		return $this;
	}

	/**
	 * Get string
	 *
	 * @return string
	 */
	public function getString()
	{
		return $this->string;
	}
}