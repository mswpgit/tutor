<?php

namespace Mod;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);
$builder->setTable('module');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('title', 'string')
	->length(100)
	->nullable(true)
	->build();

$builder->createField('content', 'text')
	->nullable(true)
	->build();

$builder->createField('ordering', 'integer')
	->length(11)
	->nullable(true)
	->build();

$builder->createField('position', 'string')
	->length(50)
	->nullable(true)
	->build();

$builder->createField('published', 'boolean')
	->nullable(true)
	->build();

$builder->createField('module', 'string')
	->length(50)
	->nullable(true)
	->build();

$builder->createField('params', 'text')
	->nullable(true)
	->build();
