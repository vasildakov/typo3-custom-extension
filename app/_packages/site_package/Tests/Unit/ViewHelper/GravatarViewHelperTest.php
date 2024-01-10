<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\ViewHelper;

use PHPUnit\Framework\MockObject\Exception;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;
use VasilDakov\SitePackage\ViewHelper\GravatarViewHelper;

final class GravatarViewHelperTest extends UnitTestCase
{
    protected ProductRepository $repository;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->repository = $this->createMock(ProductRepository::class);

        parent::setUp();
    }

    public function testItCanBeConstructed(): void
    {
        $helper = new GravatarViewHelper($this->repository);

        self::assertInstanceOf(GravatarViewHelper::class, $helper);
    }

    public function testItCanRenderExpectedString(): void
    {
        // Arrange
        $email  = 'vasildakov@gmail.com';
        $needle = '<img src="https://www.gravatar.com/avatar/' . md5($email) . '" />';
        $helper = new GravatarViewHelper($this->repository);

        // Arrange
        $reflection = new \ReflectionClass($helper);
        $arguments = $reflection->getProperty('arguments');
        $arguments->setValue($helper, ['emailAddress' => $email]);

        // Act
        $result = $helper->render();

        // Assert
        self::assertIsString($result);
        self::assertStringContainsString($needle, $result);
    }
}
