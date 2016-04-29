<?php
namespace Content;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);

$builder->setTable('category');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
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

$builder->createField('path', 'string')
	->length(255)
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
	->length(255)
	->nullable(false)
	->build();

$builder->createField('description', 'text')
	->nullable(true)
	->build();

$builder->createField('published', 'boolean')
	->nullable(true)
	->build();

$builder->createField('metadesc', 'string')
	->length(1024)
	->nullable(false)
	->build();

$builder->createField('metakey', 'string')
	->length(1024)
	->nullable(false)
	->build();

$builder->createField('params', 'text')
	->nullable(true)
	->build();

// Дочерние записи
$builder->createOneToMany('material', 'Content\Entity\Material')
	->addJoinColumn('id', 'categoryId')
	->mappedBy('category')
	->fetchLazy()
	->build();
