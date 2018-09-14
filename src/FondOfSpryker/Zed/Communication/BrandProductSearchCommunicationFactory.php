<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication;

use FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchDependencyProvider;
use FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade\BrandProductSearchToBrandProductFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchConfig getConfig()
 */
class BrandProductSearchCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade\BrandProductSearchToBrandProductFacadeInterface
     */
    public function getBrandProductFacade(): BrandProductSearchToBrandProductFacadeInterface
    {
        return $this->getProvidedDependency(BrandProductSearchDependencyProvider::FACADE_BRAND_PRODUCT);
    }
}
