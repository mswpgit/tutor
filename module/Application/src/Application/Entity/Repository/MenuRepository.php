<?php

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MenuRepository
 */
class MenuRepository extends EntityRepository
{
	public function getAllMenu()
	{
		$querybuilder = $this->createQueryBuilder('m');
		return $querybuilder->select('m')
			->orderBy('m.id', 'ASC')
			->getQuery()->getResult();
	}
}