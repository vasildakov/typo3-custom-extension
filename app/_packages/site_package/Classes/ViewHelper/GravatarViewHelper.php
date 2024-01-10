<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\ViewHelper;

use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithContentArgumentAndRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

final class GravatarViewHelper extends AbstractViewHelper
{
    //use CompileWithContentArgumentAndRenderStatic;

    protected $escapeOutput = false;

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        //var_dump(is_array($repository->findByCategory('category')));
        //var_dump($repository->findByCategory('category')->toArray());
        //var_dump($example->hello());
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


    /*
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $emailAddress = $renderChildrenClosure();

        var_dump(static::$repository->findByCategory('category')->toArray());

        return '<img src="http://www.gravatar.com/avatar/' . md5($emailAddress) . '" />';
    }
    */
}
