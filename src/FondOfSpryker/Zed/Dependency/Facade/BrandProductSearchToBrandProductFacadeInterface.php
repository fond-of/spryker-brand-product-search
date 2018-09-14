<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade;

use Generated\Shared\Transfer\BrandTransfer;

interface BrandProductSearchToBrandProductFacadeInterface
{
    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function getBrandByProductAbstractId(int $idProductAbstract): ?BrandTransfer;
}
