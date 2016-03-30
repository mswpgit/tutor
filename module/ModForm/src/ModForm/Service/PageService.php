<?php
namespace ModForm\Service;

use ModForm\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class PageService extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->entity = 'ModForm\Entity\Page';
        parent::__construct($em);
    }

    /**
     * @param array $data
     *
     * @return object
     */
    public function save(Array $data = array())
    {
        $data['category'] = $this->em->getRepository('ModForm\Entity\Category')
                                ->find($data['category']);

        return parent::save($data);
    }


}