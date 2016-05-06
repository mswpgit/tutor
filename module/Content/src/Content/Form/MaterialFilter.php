<?php

namespace Content\Form;

use Base\InputFilter\ProvidesEventsInputFilter;
use Content\Options\MaterialOptionsInterface;

class MaterialFilter extends ProvidesEventsInputFilter
{
	public function __construct(MaterialOptionsInterface $options)
	{
		$titleParams = array(
			'name'       => 'title',
			'required'   => true,
			'validators' => array(
				array(
					'name' =>'NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Пусто!'
						),
					),
				),
				array(
					'name'    => 'StringLength',
					'options' => array(
						'min' => 2,
						'max' => 100,
						'messages' => array(
							'stringLengthTooShort' => 'Минимум %min% максимум %max% символов!',
							'stringLengthTooLong' => 'Минимум %min% максимум %max% символов!'
						),
					),
				),
			),
			'filters'   => array(
				array('name' => 'StringTrim'),
			),
		);

		$this->add($titleParams);
		$this->getEventManager()->trigger('init', $this);
	}
}