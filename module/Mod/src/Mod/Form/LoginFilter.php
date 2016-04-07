<?php

namespace Mod\Form;

use Base\InputFilter\ProvidesEventsInputFilter;
use Mod\Options\AuthenticationOptionsInterface;

class LoginFilter extends ProvidesEventsInputFilter
{
	public function __construct(AuthenticationOptionsInterface $options)
	{
		$loginParams = array(
			'name'       => 'email',
			'required'   => true,
			'validators' => array()
		);

		$passwordParams = array(
			'name'       => 'password',
			'required'   => true,
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'min' => 2,
					),
				),
			),
			'filters'   => array(
				array('name' => 'StringTrim'),
			),
		);

		$this->add($loginParams);
		$this->add($passwordParams);

		$this->getEventManager()->trigger('init', $this);
	}
}
