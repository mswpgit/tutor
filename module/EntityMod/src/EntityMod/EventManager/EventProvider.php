<?php
namespace EntityMod\EventManager;

use Traversable;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;

abstract class EventProvider implements EventManagerAwareInterface
{
	/**
	 * @var EventManagerInterface
	 */
	protected $events;

	/**
	 * @see \Zend\EventManager\EventManagerAwareInterface::setEventManager()
	 * @param  EventManagerInterface $events
	 *
	 * @return EventProvider
	 */
	public function setEventManager(EventManagerInterface $events)
	{
		$identifiers = array(__CLASS__, get_called_class());

		if (isset($this->eventIdentifier))
		{
			if ((is_string($this->eventIdentifier))
				|| (is_array($this->eventIdentifier))
				|| ($this->eventIdentifier instanceof Traversable)
			)
			{
				$identifiers = array_unique(array_merge($identifiers, (array) $this->eventIdentifier));
			}
			elseif (is_object($this->eventIdentifier))
			{
				$identifiers[] = $this->eventIdentifier;
			}
		}

		$events->setIdentifiers($identifiers);
		$this->events = $events;

		return $this;
	}

	/**
	 * @see \Zend\EventManager\EventsCapableInterface::getEventManager()
	 *
	 * @return EventManagerInterface
	 */
	public function getEventManager()
	{
		if (!$this->events instanceof EventManagerInterface)
		{
			$this->setEventManager(new EventManager());
		}
		return $this->events;
	}

}
