<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageMapExpanderInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProductSearch\Business\BrandProductSearchFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\BrandProductSearch\Communication\BrandProductSearchCommunicationFactory getFactory()
 */
class BrandProductMapExpanderPlugin extends AbstractPlugin implements ProductPageMapExpanderInterface
{
    protected const KEY_PRODUCT_BRAND = 'product_brand';

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        if (!isset($productData[static::KEY_PRODUCT_BRAND])) {
            return $pageMapTransfer;
        }
        $brandTransfer = $this->getBrandProductSearchData($productData);
        $pageMapTransfer->setProductBrand($brandTransfer);

        return $pageMapTransfer;
    }

    /**
     * @param array $productData
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    protected function getBrandProductSearchData(array $productData): BrandTransfer
    {
        $brandTransfer = new BrandTransfer();
        $brandTransfer->fromArray($productData[static::KEY_PRODUCT_BRAND]);

        return $brandTransfer;
    }
}
