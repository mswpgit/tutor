<?php

namespace EntityMod;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);
$builder->setTable('cat');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('dateTime','datetime')
	->nullable(false)
	->build();

$builder->createField('isBool', 'boolean')
	->nullable(true)
	->build();

$builder->createField('string', 'string')
	->length(120)
	->nullable(false)
	->build();
