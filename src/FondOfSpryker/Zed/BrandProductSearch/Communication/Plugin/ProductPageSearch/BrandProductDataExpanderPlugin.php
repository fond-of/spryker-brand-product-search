<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductSearchTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProductSearch\Communication\BrandProductSearchCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchConfig getConfig()
 */
class BrandProductDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    protected const KEY_FK_PRODUCT_ABSTRACT = 'fk_product_abstract';

    /**
     * {@inheritDoc}
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
        $brandsCollection = $this->getFactory()->getBrandProductFacade()->getBrandsByProductAbstractId($idProductAbstract);

        $brandNames = $this->getBrandNames($brandsCollection);

        $names = new BrandProductSearchTransfer();
        $names->setNames($brandNames);

        $productAbstractPageSearchTransfer->setProductBrands($names);
    }

    /**
     * Get brand names
     *
     * @param \Generated\Shared\Transfer\BrandCollectionTransfer $brandsCollection
     *
     * @return array
     */
    protected function getBrandNames(BrandCollectionTransfer $brandsCollection): array
    {
        $names = [];

        foreach ($brandsCollection->getBrands() as $brandTransfer) {
            /** @var \Generated\Shared\Transfer\BrandTransfer $brandTransfer */
            $names[] = $brandTransfer->getName();
        }

        return $names;
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
