<?php

namespace MBase\Form;

use MBase\InputFilter\ProvidesEventsInputFilter;
use MBase\Options\ContentOptionsInterface;

class ContentFilter extends ProvidesEventsInputFilter
{
	public function __construct(ContentOptionsInterface $options)
	{
		$menuTypeParams = array(
			'name'       => 'menuType',
			'required'   => true,
			'validators' => array()
		);

		$titleParams = array(
			'name'       => 'title',
			'required'   => true,
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'min' => 2,
						'max' => 100,
					),
				),
			),
			'filters'   => array(
				array('name' => 'StringTrim'),
			),
		);

		$this->add($menuTypeParams);
		$this->add($titleParams);

		$this->getEventManager()->trigger('init', $this);
	}
}
