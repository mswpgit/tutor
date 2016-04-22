<?php

namespace MBase\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use MBase\Mapper\ContentMapper;
use Zend\View\Model\ViewModel;

class ContentService extends AbstractService
{
	/**
	 * @var  ContentMapper
	 */
	protected $mapper;

	public function getAllContentType()
	{
		return $this->getMapper()->getAll();
	}

	public function getContentByAlias($alias)
	{
		return $this->getMapper()->getContentByAlias($alias);
	}

	public function getById($id)
	{
		return $this->getMapper()->getById($id);
	}

	public function viewRender($id)
	{
		if ($id)
		{
			$content = $this->getMapper()->getById($id);
			if ($content)
			{
				$vm = new ViewModel(array(
					'content' => $content
				));

				$vm->setTemplate('m-base/view_content');

				return $vm;
			}
		}

		return '';
	}

	/**
	 * @param  string $name
	 * @return \MBase\Entity\Content
	 */
	public function getContent($name = '')
	{
//		if ($this->content instanceof Content) {
//			return $this->content;
//		}

		$mapper = $this->getMapper();

//		$this->content = new Content();
		if (! empty($name))
		{
			return $this->getMapper()->getContentByAlias($name);
//			$this->content->setName($name);
//			// @todo get "Allow preview" from ACL
//			$mapper->findByName($this->content, true);
//
//			return $this->content;
		}
		return $this->getMapper()->getContentByAlias('material_2');
//		$mapper->findHomePage($this->content);
//
//		return $this->content;
	}


}
