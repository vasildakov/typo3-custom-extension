<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ProductController
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2023 Vasil Dakov
 * @version 1.0
 */
class ProductController extends ActionController
{
    public function helloWorldAction(): ResponseInterface
    {
        return $this->htmlResponse('<h1>Hello World!</h1>');
    }
}