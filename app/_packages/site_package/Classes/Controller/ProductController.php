<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Controller;

use Throwable;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use VasilDakov\SitePackage\Domain\Model\Product;
use VasilDakov\SitePackage\Domain\Repository\CategoryRepository;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;
use VasilDakov\SitePackage\Event\SimpleEvent;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ProductController extends ActionController
{
    public function __construct(
        private readonly ProductRepository $products,
        private readonly CategoryRepository $categories,
    ) {
    }


    public function indexAction(): ResponseInterface
    {
        $itemsPerPage = 4;

        $currentPageNumber = $this->request->hasArgument('page')
            ? (int) $this->request->getArgument('page')
            : 1;

        $selectedCategory = $this->request->hasArgument('category')
            ? $this->request->getArgument('category')
            : '';


        $products = $this->products->findAll();
        $paginator = new QueryResultPaginator($products, $currentPageNumber, $itemsPerPage);
        $pagination = new SimplePagination($paginator);

        //dd($products);

        $this->eventDispatcher->dispatch(
            new SimpleEvent('Product controller index method has been called')
        );


        $this->view->assignMultiple([
            'results' => count($products),
            'selectedCategory' => $selectedCategory,
            'categories' => $this->categories->findAll(),
            'paginator'  => $paginator,
            'pagination' => $pagination,
            'products'   => $this->products->findPaginated($itemsPerPage, $currentPageNumber)
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
