<?php

namespace Content;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);

$builder->setTable('material');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('title', 'string')
	->length(255)
	->nullable(true)
	->build();

$builder->createField('alias', 'string')
	->length(50)
	->nullable(true)
	->build();

$builder->createField('state', 'string')
	->length(25)
	->nullable(true)
	->build();

$builder->createField('introtext', 'text')
	->nullable(true)
	->build();

$builder->createField('fulltext', 'text')
	->nullable(true)
	->build();

$builder->createField('description', 'text')
	->length(5)
	->nullable(true)
	->build();

$builder->createField('keyword', 'string')
	->length(1024)
	->nullable(false)
	->build();

$builder->createField('ordering', 'integer')
	->nullable(true)
	->build();

$builder->createField('params', 'text')
	->nullable(true)
	->build();

// Родительская запись
$builder->createManyToOne('category', 'Content\Entity\Category')
	->addJoinColumn('categoryId', 'id')
	->inversedBy('material')
	->fetchLazy()
	->build();
