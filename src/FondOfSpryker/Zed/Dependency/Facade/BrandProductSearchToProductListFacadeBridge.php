<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade;

use Generated\Shared\Transfer\BrandTransfer;

class BrandProductSearchToProductListFacadeBridge implements BrandProductSearchToBrandProductFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface
     */
    protected $brandProductFacade;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface $brandProductFacade
     */
    public function __construct($brandProductFacade)
    {
        $this->brandProductFacade = $brandProductFacade;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function getBrandByProductAbstractId(int $idProductAbstract): ?BrandTransfer
    {
        return $this->brandProductFacade->getBrandByProductAbstractId($idProductAbstract);
    }
}
