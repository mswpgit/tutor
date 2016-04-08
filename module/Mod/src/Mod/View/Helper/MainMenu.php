<?php

namespace Mod\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class MainMenu extends AbstractHelper
{
	protected $link = array();
	/**
	 * __invoke
	 *
	 * @access public
	 * @param array $options array of options
	 * @return string
	 */
	public function __invoke($options = array())
	{
//		\Zend\Debug\Debug::dump($this->getLink());
		$links = $this->getLink();
		if (!$links || !is_array($links))
		{
			return '';
		}
		$vm = new ViewModel(array(
			'links' => $links,
			'title' => 'Главное Меню'
		));

		$vm->setTemplate('mod/index/view_menu.phtml');
		return $this->getView()->render($vm);
	}

	public function setLink($link)
	{
		$this->link = $link;
	}

	public function getLink()
	{
		return $this->link;
	}

}