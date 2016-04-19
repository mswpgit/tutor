<?php

namespace MApp\View\Helper;

use MBase\Entity\Content as ContentEntity;

class ContentMeta extends AbstractHelper
{
	/**
	 * {@inheritdoc}
	 * {@link render()}
	 */
	public function __invoke(ContentEntity $entity)
	{
		return $this->render($entity);
	}

	/**
	 * @param ContentEntity $entity
	 * @return string
	 */
	public function render(ContentEntity $entity)
	{
		$html = '<span>' . $entity->getTitle() . '</span>' . PHP_EOL
			. '<span class="pull-right">' . $this->createBadges($entity->getCategory()) . '</span>';

		return $html;
	}


	/**
	 * @param $cat
	 * @return string
	 */
	protected function createBadges($cat)
	{
		$html = '';
//		\Zend\Debug\Debug::dump($tags->getTitle());die;

		/** @var \MBase\Entity\Category $cat */
			$tagName = $cat->getTitle();
//		return $tagName;
//			$content = $this->getRenderer()->badge($this->getRenderer()->translate($tagName));
		$content = '';
			$html .= $this->getRenderer()->catAnchor($tagName, $content) . PHP_EOL;


		return $html;
	}
}
