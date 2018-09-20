<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade;

use Generated\Shared\Transfer\BrandCollectionTransfer;

interface BrandProductSearchToBrandProductFacadeInterface
{
    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandsByProductAbstractId(int $idProductAbstract): BrandCollectionTransfer;
}
