<?php

namespace Mod;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);
$builder->setTable('menu');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('menuType', 'string')
	->length(50)
	->nullable(false)
	->build();

$builder->createField('title', 'string')
	->length(100)
	->nullable(false)
	->build();

$builder->createField('description', 'string')
	->length(255)
	->nullable(false)
	->build();

$builder->createField('isActive', 'boolean')
	->nullable(true)
	->build();


