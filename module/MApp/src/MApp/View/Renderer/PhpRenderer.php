<?php

namespace MApp\View\Renderer;

use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * @method string markdown($text)
 * @method string anchor($href, $title, $content, $class = null)
 * @method string anchorBookmark($href, $title, $content, $class = null)
 * @method string hashId($id)
 * @method string slugify($value)
 * @method string panel($header, $content, $footer)
 * @method string contentMeta(\MBase\Entity\Content $entity)
 * @method string permaLinkPost(\MBase\Entity\Post $entity)
 * @method string permaLinkTag($tagName)
 * @method string tag(\MBase\Entity\Tag $entity)
 * @method string tagList()
 * @method string catAnchor($tagName, $content)
 * @method string badge($message = null, array $attributes = null)
 * @method string glyphicon($name, array $attributes = null)
 * @method string dateFormat(\DateTime $date, $dateType = null, $timeType = null, $locale = null, $pattern = null)
 * @method string translate($message, $textDomain = null, $locale = null)
 */
class PhpRenderer extends ZendPhpRenderer
{
}
