<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface;
use Generated\Shared\Transfer\BrandCollectionTransfer;

class BrandProductSearchToProductListFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProductSearch\Dependency\Facade\BrandProductSearchToProductListFacadeBridge
     */
    protected $brandProductSearchToProductListFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface
     */
    protected $brandProductFacadeInterfaceMock;

    /**
     * @var int
     */
    protected $idProductAbstract;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandCollectionTransfer
     */
    protected $brandCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandProductFacadeInterfaceMock = $this->getMockBuilder(BrandProductFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idProductAbstract = 1;

        $this->brandCollectionTransferMock = $this->getMockBuilder(BrandCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductSearchToProductListFacadeBridge = new BrandProductSearchToProductListFacadeBridge(
            $this->brandProductFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testGetBrandsByProductAbstractId(): void
    {
        $this->brandProductFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('getBrandsByProductAbstractId')
            ->willReturn($this->brandCollectionTransferMock);

        $this->assertInstanceOf(
            BrandCollectionTransfer::class,
            $this->brandProductSearchToProductListFacadeBridge->getBrandsByProductAbstractId(
                $this->idProductAbstract
            )
        );
    }
}
