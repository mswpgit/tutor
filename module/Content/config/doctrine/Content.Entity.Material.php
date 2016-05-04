<?php

namespace Content;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);

$builder->setTable('material');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('assetId', 'integer')
	->nullable(false)
	->build();

// Родительская запись
$builder->createManyToOne('category', 'Content\Entity\Category')
	->addJoinColumn('categoryId', 'id')
	->inversedBy('material')
	->fetchLazy()
	->build();

$builder->createField('title', 'string')
	->length(255)
	->nullable(false)
	->build();

$builder->createField('alias', 'string')
	->length(400)
	->nullable(false)
	->build();

$builder->createField('introText', 'text')
	->nullable(true)
	->build();

$builder->createField('content', 'text')
	->nullable(false)
	->build();

$builder->createField('keywords', 'string')
	->length(1024)
	->nullable(true)
	->build();

$builder->createField('description', 'string')
	->length(1024)
	->nullable(true)
	->build();

$builder->createField('state', 'integer')
	->length(1)
	->nullable(true)
	->build();

$builder->createField('ordering', 'integer')
	->length(11)
	->nullable(true)
	->build();

$builder->createField('dateCreated', 'datetime')
	->nullable(true)
	->build();

$builder->createField('dateUpdated', 'datetime')
	->nullable(true)
	->build();

$builder->createField('params', 'text')
	->nullable(false)
	->build();

$builder->createField('metaData', 'text')
	->nullable(false)
	->build();
