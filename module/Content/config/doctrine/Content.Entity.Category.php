<?php
namespace Content;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);

$builder->setTable('category');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('assetId', 'integer')
	->nullable(false)
	->build();

// Родительская запись
$builder->createManyToOne('parentCategory', 'Content\Entity\Category')
	->addJoinColumn('parentId', 'id')
	->inversedBy('childCategories')
	->fetchLazy()
	->build();

// Дочерние записи
$builder->createOneToMany('childCategories', 'Content\Entity\Category')
	->addJoinColumn('id', 'parentId')
	->mappedBy('parentCategory')
	->fetchLazy()
	->build();

// Дочерние записи
$builder->createOneToMany('material', 'Content\Entity\Material')
	->addJoinColumn('id', 'categoryId')
	->mappedBy('category')
	->fetchLazy()
	->build();

$builder->createField('path', 'string')
	->length(400)
	->nullable(true)
	->build();

$builder->createField('extension', 'string')
	->length(50)
	->nullable(true)
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

$builder->createField('state', 'integer')
	->length(1)
	->nullable(true)
	->build();

$builder->createField('keywords', 'string')
	->length(1024)
	->nullable(true)
	->build();

$builder->createField('description', 'string')
	->length(1024)
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
