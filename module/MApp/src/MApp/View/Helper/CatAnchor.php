<?php

namespace MApp\View\Helper;

class CatAnchor extends AbstractHelper
{
	/**
	 * {@inheritdoc}
	 * {@link render()}
	 */
	public function __invoke($tagName, $content)
	{
		return $this->render($tagName, $content);
	}

	/**
	 * @param string $tagName
	 * @param string $content
	 * @return string
	 */
	public function render($tagName, $content)
	{
		$serverUrl = $this->getRenderer()->serverUrl();

		$url = $this->getRenderer()->url(
			'content',
			array('allias' => $tagName)
		);

		return $serverUrl . $url;
	}
}
