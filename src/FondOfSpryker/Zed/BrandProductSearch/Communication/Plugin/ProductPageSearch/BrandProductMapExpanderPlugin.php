<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\BrandProductSearchTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageMapExpanderInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProductSearch\Communication\BrandProductSearchCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchConfig getConfig()
 */
class BrandProductMapExpanderPlugin extends AbstractPlugin implements ProductPageMapExpanderInterface
{
    protected const KEY_PRODUCT_BRAND = 'product_brands';

    /**
     * {@inheritDoc}
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
    public function expandProductPageMap(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $productData,
        LocaleTransfer $localeTransfer
    ): PageMapTransfer {
        if (!isset($productData[static::KEY_PRODUCT_BRAND])) {
            return $pageMapTransfer;
        }

        $transfer = (new BrandProductSearchTransfer())->fromArray($productData[static::KEY_PRODUCT_BRAND]);
        $pageMapTransfer->setProductBrands($transfer);

        return $pageMapTransfer;
    }
}
