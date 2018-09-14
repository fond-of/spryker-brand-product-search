<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProductSearch\Communication\BrandProductSearchCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\BrandProductSearch\Business\BrandProductSearchFacadeInterface getFacade()
 */
class BrandProductDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    protected const KEY_FK_PRODUCT_ABSTRACT = 'fk_product_abstract';

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer): void
    {
        $idProductAbstract = $this->getIdProductAbstract($productData);
        $brand = $this->getFactory()->getBrandProductFacade()->getBrandByProductAbstractId($idProductAbstract);

        $productAbstractPageSearchTransfer->setProductBrand(null);

        if ($brand !== null) {
            $productAbstractPageSearchTransfer->setProductBrand($brand);
        }
    }

    /**
     * @param array $productData
     *
     * @return int
     */
    protected function getIdProductAbstract(array $productData): int
    {
        return $productData[static::KEY_FK_PRODUCT_ABSTRACT];
    }
}
