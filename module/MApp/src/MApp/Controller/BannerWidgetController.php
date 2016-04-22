<?php

namespace MApp\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use MApp\Entity\WidgetInterface;
use //ScContent\Controller\AbstractWidget,
//	ScContent\Options\ModuleOptions as ScModuleOptions,
//	//
//	ScWidgets\Form\BannerForm,
//	ScWidgets\Entity\Banner,
//	//
	Zend\View\Model\ViewModel;
class BannerWidgetController extends AbstractActionController
{

	public function indexAction()
	{

		$scModuleOptions = $this->getServiceLocator()->get('appThemeModule');
		$view = new ViewModel();
		$item = $this->getItem();
		if ($item->findOption('image')) {
			$image = $item->findOption('image');
//			$scModuleOptions = $this->getScModuleOptions();
			$theme = $scModuleOptions->getFrontendTheme();
			$themeImages = sprintf(
				'/%s/img', $scModuleOptions->getFrontendThemeName()
			);
			if (isset($theme['images'])) {
				$themeImages = $theme['images'];
			}
			$image = str_replace('{theme_images}', $themeImages, $image);
			$uploadsSrc = $scModuleOptions->getAppUploadsSrc();
			$image = str_replace('{uploads}', $uploadsSrc, $image);
			$view->image = $image;
		}
		return $view;
	}

	/**
	 * @var \MApp\Entity\WidgetInterface
	 */
	protected $item;

	/**
	 * @param  \MApp\Entity\WidgetInterface $item
	 * @return void
	 */
	public function setItem(WidgetInterface $item)
	{
		$this->item = $item;
	}

	/**
	 * @return \MApp\Entity\WidgetInterface
	 */
	public function getItem()
	{
		if (! $this->item instanceof WidgetInterface) {
			throw new IoCException(
				'Item data was not set.'
			);
		}
		return $this->item;
	}
}