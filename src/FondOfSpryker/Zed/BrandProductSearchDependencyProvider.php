<?php

namespace FondOfSpryker\Zed\BrandProductSearch;

use FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade\BrandProductSearchToProductListFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class BrandProductSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_BRAND_PRODUCT = 'FACADE_BRAND_PRODUCT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addBrandProductFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addBrandProductFacade(Container $container): Container
    {
        $container[static::FACADE_BRAND_PRODUCT] = function (Container $container) {
            return new BrandProductSearchToProductListFacadeBridge($container->getLocator()->brandProduct()->facade());
        };

        return $container;
    }
}
