<?php

namespace MBase;

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
	->length(255)
	->nullable(false)
	->build();

$builder->createField('alias', 'string')
	->length(255)
	->nullable(false)
	->build();

$builder->createField('path', 'string')
	->length(1024)
	->nullable(true)
	->build();

$builder->createField('link', 'string')
	->length(1024)
	->nullable(true)
	->build();

$builder->createField('published', 'boolean')
	->nullable(true)
	->build();

$builder->createField('type', 'string')
	->length(20)
	->nullable(true)
	->build();

// Родительская запись
$builder->createManyToOne('parentMenu', 'MBase\Entity\Menu')
	->addJoinColumn('parentId', 'id')
	->inversedBy('childMenu')
	->fetchLazy()
	->build();

// Дочерние записи
$builder->createOneToMany('childMenu', 'MBase\Entity\Menu')
	->addJoinColumn('id', 'parentId')
	->mappedBy('parentMenu')
	->fetchLazy()
	->build();

$builder->createField('home', 'boolean')
	->nullable(true)
	->build();

$builder->createField('params', 'text')
	->nullable(true)
	->build();
