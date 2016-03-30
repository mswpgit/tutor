<?php
namespace ModForm\Service;

use ModForm\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class CategoryService extends AbstractService
{
	public function __construct(EntityManager $em)
	{
		$this->entity = 'ModForm\Entity\Category';
		parent::__construct($em);
	}
}