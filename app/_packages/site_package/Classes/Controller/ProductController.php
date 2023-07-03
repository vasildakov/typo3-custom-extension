<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Controller;

use Throwable;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use VasilDakov\SitePackage\Domain\Model\Product;
use VasilDakov\SitePackage\Domain\Repository\CategoryRepository;
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
    private ProductRepository $products;

    private CategoryRepository $categories;

    public function injectProductRepository(ProductRepository $products): void
    {
        $this->products = $products;
    }

    public function injectCategoryRepository(CategoryRepository $categories): void
    {
        $this->categories = $categories;
    }


    public function indexAction(): ResponseInterface
    {

        $itemsPerPage = 2;
        $currentPageNumber = 1;
        if ($this->request->hasArgument('page')) {
            $currentPageNumber = (int)$this->request->getArgument('page');
        }

        $selectedCategory = '';
        if ($this->request->hasArgument('category')) {
            $selectedCategory = $this->request->getArgument('category');
        }

        $all = $this->products->findAll();
        $paginator = new QueryResultPaginator($all, $currentPageNumber, $itemsPerPage);
        $pagination = new SimplePagination($paginator);


        $this->view->assignMultiple([
            'results' => count($all),
            'selectedCategory' => $selectedCategory,
            'categories' => $this->categories->findAll(),
            'paginator' => $paginator,
            'pagination' => $pagination,
            'products' => $this->products->findPaginated($itemsPerPage, $currentPageNumber)
        ]);
        return $this->htmlResponse();

        /*var_dump([
            'args'  => $this->request->getArguments(),
            'query' => $this->request->getQueryParams()
        ]); */

        /*
        $args = $this->request->getArguments();

        if (isset($args['category'])) {
            $products = $this->products->findByCategory($args['category']);
        } else {
            $products = $this->products->findAll();
        }


        $this->view->assign('selectedCategory', $args['category']);
        $this->view->assign('products', $products);
        $this->view->assign('categories', $this->categories->findAll());
        $this->view->assign('settings', $this->settings);

        return $this->htmlResponse(); */
    }

    public function showAction(Product $product): ResponseInterface
    {
        //DebugUtility::debug($product->getCategories(), 'categories');
        //DebugUtility::debug($product, 'product');

        $this->view->assign('product', $product);
        $this->view->assign('categories', $product->getCategories());

        return $this->htmlResponse();
    }

    public function searchAction(): ResponseInterface
    {
        $this->redirect('index');
    }
}
