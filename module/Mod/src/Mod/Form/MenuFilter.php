<?php

namespace Mod\Form;

use Base\InputFilter\ProvidesEventsInputFilter;
use Mod\Options\MenuServiceInterface;

class MenuFilter extends ProvidesEventsInputFilter
{
	public function __construct(MenuServiceInterface $options)
	{
		$identityParams = array(
			'name'       => 'identity',
			'required'   => true,
			'validators' => array()
		);

		$this->add($identityParams);

		$this->add(array(
			'name'       => 'credential',
			'required'   => true,
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'min' => 6,
					),
				),
			),
			'filters'   => array(
				array('name' => 'StringTrim'),
			),
		));

		$this->getEventManager()->trigger('init', $this);
	}
}
