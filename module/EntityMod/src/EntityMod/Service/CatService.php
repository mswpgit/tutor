<?php

namespace EntityMod\Service;


class CatService extends AbstractService
{
	/** @var  \EntityMod\Mapper\CatMapper */
	protected $mapper;

	/**
	 * @param $dateTime
	 *
	 * @return int
	 * @throws \LogicException
	 */
	private function getTimestamp($dateTime)
	{
		if(is_string($dateTime))
		{
			$timestamp = strtotime($dateTime);
		}
		elseif($dateTime instanceof \DateTime)
		{
			$timestamp = $dateTime->getTimestamp();
		}
		elseif(is_int($dateTime))
		{
			$timestamp = $dateTime;
		}
		else
		{
			throw new \LogicException('Передано некорректное значение даты.');
		}

		return $timestamp;
	}

	public function __construct($mapper)
	{
		$this->setMapper($mapper);
	}

	/**
	 * @param \EntityMod\Mapper\CatMapper $mapper
	 *
	 * @return $this
	 */
	public function setMapper($mapper)
	{
		$this->mapper = $mapper;
		return $this;
	}

	/**
	 * @return \EntityMod\Mapper\CatMapper
	 */
	public function getMapper()
	{
		return $this->mapper;
	}

}