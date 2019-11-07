<?php

namespace FondOfSpryker\Zed\BrandProductSearch;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class BrandProductSearchDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchDependencyProvider
     */
    protected $brandProductSearchDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductSearchDependencyProvider = new BrandProductSearchDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideCommunicationLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->brandProductSearchDependencyProvider->provideCommunicationLayerDependencies(
                $this->containerMock
            )
        );
    }
}
