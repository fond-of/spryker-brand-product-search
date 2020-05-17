<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearchExtension;

use Generated\Shared\Transfer\BrandProductSearchTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductAbstractMapExpanderPluginInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchConfig getConfig()
 * @method \FondOfSpryker\Zed\BrandProductSearch\Communication\BrandProductSearchCommunicationFactory getFactory()
 */
class BrandProductMapExpanderPlugin extends AbstractPlugin implements ProductAbstractMapExpanderPluginInterface
{
    protected const KEY_PRODUCT_BRAND = 'product_brands';

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductMap(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $productData,
        LocaleTransfer $localeTransfer
    ): PageMapTransfer {
        if (!isset($productData[static::KEY_PRODUCT_BRAND])) {
            return $pageMapTransfer;
        }

        $transfer = (new BrandProductSearchTransfer())->fromArray($productData[static::KEY_PRODUCT_BRAND]);

        return $pageMapTransfer->setProductBrands($transfer);
    }
}
