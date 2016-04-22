<?php

namespace MApp\Entity;

class Widget implements WidgetInterface
{
	/**
	 * @var null|integer|string
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $theme = '';

	/**
	 * @var string
	 */
	protected $region = '';

	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var string
	 */
	protected $displayName = '';

	/**
	 * @var string
	 */
	protected $description = '';

	/**
	 * @var array
	 */
	protected $options = array();

	/**
	 * @var integer
	 */
	protected $position = 0;

	/**
	 * @param null|integer|string $id
	 * @return Widget
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return null|integer|string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param  string $name
	 * @return Widget
	 */
	public function setTheme($name)
	{
		$this->theme = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTheme()
	{
		return $this->theme;
	}

	/**
	 * @param  string $region
	 * @return Widget
	 */
	public function setRegion($region)
	{
		$this->region = $region;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRegion()
	{
		return $this->region;
	}

	/**
	 * @param  string $name
	 * @return Widget
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param  string $name
	 * @return Widget
	 */
	public function setDisplayName($name)
	{
		$this->displayName = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDisplayName()
	{
		return $this->displayName;
	}

	/**
	 * @return boolean
	 */
	public function hasDescription()
	{
		return ! empty($this->description);
	}

	/**
	 * @param  string $description
	 * @return Widget
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param  string|array $options Array of options or a serialized options as string
	 * @return Widget
	 */
	public function setOptions($options)
	{
		if (is_string($options))
		{
			$options = unserialize($options);
		}

		$this->options = $options;
		return $this;
	}

	/**
	 * @param  boolean $serialized optional default true
	 * @return array|string
	 */
	public function getOptions($serialized = true)
	{
		if ($serialized)
		{
			return serialize($this->options);
		}
		return $this->options;
	}

	/**
	 * @param  string $name
	 * @param  mixed $value
	 * @return Widget
	 */
	public function setOption($name, $value)
	{
		$this->options[$name] = $value;
		return $this;
	}

	/**
	 * @param  string $name
	 * @param  mixed $default optional default null
	 * @return mixed
	 */
	public function findOption($name, $default = null)
	{
		if (array_key_exists($name, $this->options))
		{
			return $this->options[$name];
		}

		return $default;
	}

	/**
	 * Checks whether the widget is applicable to the role.
	 * This behavior differs from the ACL. Returns FALSE if and only if the
	 * widget is explicitly disabled for a given role.
	 *
	 * This is true because the widgets do not have to perform any
	 * function other than displaying information. To change the information
	 * are frontend and backend controllers, protected access
	 * to them engaged ACL.
	 *
	 * @param  string $role
	 * @return boolean
	 */
	public function isApplicable($role)
	{
		if (isset($this->options['roles'][$role]))
		{
			return (bool) (int) $this->options['roles'][$role];
		}
		return true;
	}

	/**
	 * @param  integer $position
	 * @return Widget
	 */
	public function setPosition($position)
	{
		$this->position = (int) $position;
		return $this;
	}

	/**
	 * @return integer
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * @param  array|\Traversable $data
	 * @throws \DomainException
	 * @return AbstractEntity
	 */
	public function exchangeArray($data)
	{
		if (! is_array($data) && ! $data instanceof Traversable)
		{
			throw new \DomainException(sprintf(
				'Data provided to %s must be an %s or %s',
				__METHOD__, 'array', 'Traversable'
			));
		}
		foreach ($data as $key => $value)
		{
			$setter = 'set' . str_replace(
				' ', '', ucwords(str_replace('_', ' ', $key))
			);
			if (! method_exists($this, $setter))
			{
				continue;
			}
			$this->{$setter}($value);
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getArrayCopy()
	{
		$array = array();
		$transform = function ($letters) {
			$letter = array_shift($letters);
			return '_' . strtolower($letter);
		};
		$methods = get_class_methods($this);
		foreach ($methods as $method)
		{
			if ('getarraycopy' == strtolower($method))
			{
				continue;
			}
			if (substr($method, 0, 3) != 'get')
			{
				continue;
			}
			$key = lcfirst(substr($method, 3));
			$normalizedKey = preg_replace_callback(
				'/([A-Z])/', $transform, $key
			);
			$value = $this->{$method}();
			$array[$normalizedKey] = $value;
		}
		return $array;
	}
}
