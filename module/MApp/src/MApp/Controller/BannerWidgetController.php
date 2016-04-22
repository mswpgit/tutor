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
class BannerWidgetController extends AbstractWidget
{

	public function indexAction()
	{

		$scModuleOptions = $this->getServiceLocator()->get('appThemeModule');
		$view = new ViewModel();
		$item = $this->getItem();
		if ($item->findOption('image')) {
			$image = $item->findOption('image');
			$theme = $scModuleOptions->getCurrentTheme();
			$themeImages = sprintf(
				'/%s/img', $scModuleOptions->getThemeName()
			);
			if (isset($theme['images'])) {
				$themeImages = $theme['images'];
			}
			$image = str_replace('{theme_images}', $themeImages, $image);
			$view->image = $image;
		}
		return $view;
	}

}