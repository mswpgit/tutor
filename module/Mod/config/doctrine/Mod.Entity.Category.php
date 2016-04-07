<?php
// https://github.com/l3pp4rd/DoctrineExtensions/blob/master/example/app/Entity/Category.php
namespace Mod;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;

$builder = new ClassMetadataBuilder($metadata);
$builder->setTable('category');

$builder->createField('id', 'integer')
	->isPrimaryKey()
	->generatedValue()
	->build();

$builder->createField('title', 'string')
	->length(130)
	->nullable(false)
	->build();

// Родительская запись
$builder->createManyToOne('parent_category', 'Mod\Entity\Category')
	->addJoinColumn('parent_category_id', 'id')
	->inversedBy('child_categories')
	->fetchLazy()
	->build();

// Дочерние записи
$builder->createOneToMany('child_categories', 'Mod\Entity\Category')
	->addJoinColumn('id', 'parent_category_id')
	->mappedBy('parent_category')
	->fetchLazy()
	->build();





//$builder = new ClassMetadataBuilder($metadata);
//$builder->setTable('okopf');
//
//// Родительская запись
//$builder->createManyToOne('parent', __NAMESPACE__ . '\Entity\Organization\LegalForm')
//	->addJoinColumn('parentId', 'id')
//	->fetchLazy()
//	->build();
//
//// Дочерние записи
//$builder->createOneToMany('childrens', __NAMESPACE__ . '\Entity\Organization\LegalForm')
//	->addJoinColumn('id', 'parentId')
//	->mappedBy('parent')
//	->fetchLazy()
//	->build();


