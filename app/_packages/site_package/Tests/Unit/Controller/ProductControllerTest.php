<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\Exception;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use TYPO3\CMS\Extbase\Mvc\RequestInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use VasilDakov\SitePackage\Controller\ProductController;
use VasilDakov\SitePackage\Domain\Repository\CategoryRepository;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @covers \VasilDakov\SitePackage\Controller\ProductController
 */
final class ProductControllerTest extends UnitTestCase
{
    protected RequestInterface $request;
    protected ResponseInterface $response;
    protected ResponseFactoryInterface $responseFactory;
    protected StreamFactoryInterface $streamFactory;
    protected StreamInterface $stream;
    protected ViewInterface $view;
    protected EventDispatcherInterface $eventDispatcher;

    protected QueryInterface $query;
    protected QueryResultInterface $queryResult;

    protected ProductRepository $products;
    protected CategoryRepository $categories;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->view            = $this->createMock(ViewInterface::class);
        $this->responseFactory = $this->createMock(ResponseFactoryInterface::class);
        $this->request         = $this->createMock(RequestInterface::class);
        $this->response        = $this->createMock(ResponseInterface::class);
        $this->streamFactory   = $this->createMock(StreamFactoryInterface::class);
        $this->stream          = $this->createMock(StreamInterface::class);
        $this->query           = $this->createMock(QueryInterface::class);
        $this->queryResult     = $this->createMock(QueryResultInterface::class);
        $this->products        = $this->createMock(ProductRepository::class);
        $this->categories      = $this->createMock(CategoryRepository::class);
        $this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);

        parent::setUp();
    }

    private function createController(): ProductController
    {
        $controller = new ProductController($this->products, $this->categories);

        $reflection = new \ReflectionClass($controller);

        $reflection->getProperty('request')->setValue($controller, $this->request);
        $reflection->getProperty('eventDispatcher')->setValue($controller, $this->eventDispatcher);
        $reflection->getProperty('view')->setValue($controller, $this->view);

        $responseFactory = $reflection->getProperty('responseFactory');
        $responseFactory->setValue($controller, $this->responseFactory);

        $streamFactory = $reflection->getProperty('streamFactory');
        $streamFactory->setValue($controller, $this->streamFactory);

        return $controller;
    }


    public function testItCanBeCreated(): void
    {
        $controller = $this->createController();

        self::assertInstanceOf(ProductController::class, $controller);
    }

    public function testIndexActionReturnsResponse(): void
    {
        $controller = $this->createController();

        $this->request
            ->expects(self::exactly(2))
            ->method('hasArgument')
            //->with('page', 'category')
            ->willReturnOnConsecutiveCalls(true, true)
        ;

        $this->request
            ->expects(self::exactly(2))
            ->method('getArgument')
            //->with('page', 'category')
            ->willReturnOnConsecutiveCalls(1, 'Smartphone')
        ;

        $this->products
            ->expects(self::once())
            ->method('findAll')
            ->willReturn($this->queryResult)
        ;

        $this->queryResult
            ->expects(self::once())
            ->method('getQuery')
            ->willReturn($this->query)
        ;

        $this->query
            ->expects(self::once())
            ->method('setLimit')
            ->willReturnSelf()
        ;

        $this->query
            ->expects(self::once())
            ->method('setOffset')
            ->willReturnSelf()
        ;

        $this->query
            ->expects(self::once())
            ->method('execute')
            ->willReturn($this->queryResult)
        ;

        $this->eventDispatcher
            ->expects(self::once())
            ->method('dispatch')
        ;

        $this->view
            ->expects(self::once())
            ->method('assignMultiple')
            ->willReturnSelf()
        ;

        $this->responseFactory
            ->expects(self::once())
            ->method('createResponse')
            ->willReturn($this->response)
        ;

        $this->streamFactory
            ->expects(self::once())
            ->method('createStream')
            ->with('')
            ->willReturn($this->stream)
        ;

        $this->response
            ->expects(self::once())
            ->method('withHeader')
            ->with('Content-Type', 'text/html; charset=utf-8')
            ->willReturn($this->response)
        ;

        $this->response
            ->expects(self::once())
            ->method('withBody')
            ->willReturn($this->response)
        ;

        $response = $controller->indexAction();

        self::assertInstanceOf(ResponseInterface::class, $response);
    }
}
