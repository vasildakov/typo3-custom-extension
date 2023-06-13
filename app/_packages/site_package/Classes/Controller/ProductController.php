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
        $this->view->assign('products', $this->repository->findAll());
        $this->view->assign('settings', $this->settings);
        return $this->htmlResponse();
    }

    public function showAction(Product $product): ResponseInterface
    {
        // var_dump( $product->getUid());
        //$aCategory,
        //true,
        //$table,
        //$relationField

        $collection = \TYPO3\CMS\Frontend\Category\Collection\CategoryCollection::load(
            1,
            true,
            'tx_sitepackage_domain_model_product',
            'categories'
        );

        /* if ($collection->count() > 0) {
            // Add items to the collection of records for the current table
            foreach ($collection as $item) {
                echo '<pre>'; var_dump([
                    'item' => $item
                ]);
            }
        } */


        $this->view->assign('product', $product);
        //$this->view->assign('category', $category);
        return $this->htmlResponse();
    }
}
