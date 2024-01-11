<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\ViewHelper;

use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithContentArgumentAndRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class GravatarViewHelper extends AbstractViewHelper
{
    //use CompileWithContentArgumentAndRenderStatic;

    protected $escapeOutput = false;

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function initializeArguments(): void
    {
        $this->registerArgument(
            'emailAddress',
            'string',
            'The email address to resolve the gravatar for',
            true
        );
    }

    public function render(): string
    {
        return '<img src="https://www.gravatar.com/avatar/' . md5($this->arguments['emailAddress']) . '" />';
    }
}
