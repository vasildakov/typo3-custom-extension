<?php

namespace VasilDakov\SitePackage\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\Exception;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;
use VasilDakov\SitePackage\Controller\ProductController;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @covers \VasilDakov\SitePackage\Controller\ProductController
 */
final class ProductControllerTest extends UnitTestCase
{
    protected ResponseInterface $response;
    protected ResponseFactoryInterface $responseFactory;
    protected StreamFactoryInterface $streamFactory;
    protected StreamInterface $stream;
    protected ViewInterface $view;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->view            = $this->createMock(ViewInterface::class);
        $this->responseFactory = $this->createMock(ResponseFactoryInterface::class);
        $this->response        = $this->createMock(ResponseInterface::class);
        $this->streamFactory   = $this->createMock(StreamFactoryInterface::class);
        $this->stream          = $this->createMock(StreamInterface::class);

        parent::setUp();
    }

    private function createController(): ProductController
    {
        $controller = new ProductController();

        $reflection = new \ReflectionClass($controller);
        $view = $reflection->getProperty('view');
        $view->setValue($controller, $this->view);

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

    public function testTestActionReturnsResponse(): void
    {
        $controller = $this->createController();

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

        $response = $controller->testAction();

        self::assertInstanceOf(ResponseInterface::class, $response);
    }
}
