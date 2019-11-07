<?php


namespace FondOfSpryker\Zed\BrandProductSearch\Communication;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProductSearch\BrandProductSearchDependencyProvider;
use FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade\BrandProductSearchToBrandProductFacadeInterface;
use Spryker\Zed\Kernel\Container;

class BrandProductSearchCommunicationFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProductSearch\Communication\BrandProductSearchCommunicationFactory
     */
    protected $brandProductSearchCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade\BrandProductSearchToBrandProductFacadeInterface
     */
    protected $brandProductSearchToBrandProductFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductSearchToBrandProductFacadeInterfaceMock = $this->getMockBuilder(BrandProductSearchToBrandProductFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductSearchCommunicationFactory = new BrandProductSearchCommunicationFactory();
        $this->brandProductSearchCommunicationFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testGetBrandProductFacade(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(BrandProductSearchDependencyProvider::FACADE_BRAND_PRODUCT)
            ->willReturn($this->brandProductSearchToBrandProductFacadeInterfaceMock);

        $this->assertInstanceOf(
            BrandProductSearchToBrandProductFacadeInterface::class,
            $this->brandProductSearchCommunicationFactory->getBrandProductFacade()
        );
    }
}
