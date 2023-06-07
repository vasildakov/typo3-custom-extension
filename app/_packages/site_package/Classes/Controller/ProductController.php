<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use VasilDakov\SitePackage\Domain\Model\Product;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

/**
 * Class ProductController
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2023 Vasil Dakov
 * @version 1.0
 */
class ProductController extends ActionController
{
    private ProductRepository $repository;

    public function injectProductRepository(ProductRepository $repository): void
    {
        $this->repository = $repository;
    }

    public function indexAction(): ResponseInterface
    {
        exit(__CLASS__);
        $this->view->assign('products', $this->repository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(Product $product): ResponseInterface
    {
        $this->view->assign('product', $product);
        return $this->htmlResponse();
    }
}
