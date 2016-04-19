<?php

namespace MApp\View\Helper;

use MBase\Entity\Content as ContentEntity;

class ContentPanel extends AbstractHelper
{
	/** @var ContentEntity */
	protected $entity;

	/** @var string */
	protected $header;

	/** @var string */
	protected $content;

	/** @var string */
	protected $footer;

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
		$this->entity = $entity;

		$this->createHeader();
		$this->createContent();
		$this->createFooter();

		return $this->getRenderer()->panel($this->header, $this->content, $this->footer);
	}

	/**
	 * @return void
	 */
	protected function createHeader()
	{
		$this->header = $this->entity->getTitle();
	}

	/**
	 * @return void
	 */
	protected function createContent()
	{
//		$this->content = $this->getRenderer()->markdown($this->entity->getFulltext());
		$this->content = $this->entity->getFulltext();
	}

	/**
	 * @return void
	 */
	protected function createFooter()
	{
		$this->footer = $this->getRenderer()->contentMeta($this->entity);
	}
}
