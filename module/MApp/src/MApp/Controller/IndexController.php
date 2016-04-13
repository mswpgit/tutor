<?php

namespace MApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
	    // одно вложение
	    /** @var $em \Doctrine\ORM\EntityManager */
	    $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
	    $root_categories = $em->getRepository('MBase\Entity\Category')
		    ->findBy(array('parentCategory' => null));

	    $root_menu = $em->getRepository('MBase\Entity\Menu')
		    ->findBy(array('parentMenu' => null));

	    $collection_category = new \Doctrine\Common\Collections\ArrayCollection($root_categories);
	    $collection_menu     = new \Doctrine\Common\Collections\ArrayCollection($root_menu);
	    $category_iterator   = new \MBase\Entity\RecursiveCategoryIterator($collection_category);
	    $menu_iterator       = new \MBase\Entity\RecursiveMenuIterator($collection_menu);
	    $recursive_category_iterator  = new \RecursiveIteratorIterator($category_iterator, \RecursiveIteratorIterator::SELF_FIRST);
	    $recursive_menu_iterator      = new \RecursiveIteratorIterator($menu_iterator, \RecursiveIteratorIterator::SELF_FIRST);

        return new ViewModel(
	        array(
		        'recursive_category_iterator' => $recursive_category_iterator,
		        'recursive_menu_iterator'     => $recursive_menu_iterator,
	        )
        );
    }
}
