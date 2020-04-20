<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearchExtension;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\BrandProductSearchTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface;

class BrandProductMapExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearchExtension\BrandProductMapExpanderPlugin
     */
    protected $brandProductMapExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PageMapTransfer
     */
    protected $pageMapTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface
     */
    protected $pageMapBuilderInterfaceMock;

    /**
     * @var array
     */
    protected $productData;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\LocaleTransfer
     */
    protected $localeTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->pageMapTransferMock = $this->getMockBuilder(PageMapTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->pageMapBuilderInterfaceMock = $this->getMockBuilder(PageMapBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productData = [
            "product_brands" => [],
        ];

        $this->localeTransferMock = $this->getMockBuilder(LocaleTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductMapExpanderPlugin = new BrandProductMapExpanderPlugin();
    }

    /**
     * @return void
     */
    public function testExpandProductMap(): void
    {
        $this->pageMapTransferMock->expects($this->atLeastOnce())
            ->method('setProductBrands')
            ->with($this->isInstanceOf(BrandProductSearchTransfer::class))
            ->willReturn($this->pageMapTransferMock);

        $this->brandProductMapExpanderPlugin->expandProductMap(
            $this->pageMapTransferMock,
            $this->pageMapBuilderInterfaceMock,
            $this->productData,
            $this->localeTransferMock
        );
    }

    /**
     * @return void
     */
    public function testExpandProductMapNoProductBrand(): void
    {
        $this->pageMapTransferMock->expects($this->never())
            ->method('setProductBrands')
            ->with($this->isInstanceOf(BrandProductSearchTransfer::class))
            ->willReturn($this->pageMapTransferMock);

        $this->brandProductMapExpanderPlugin->expandProductMap(
            $this->pageMapTransferMock,
            $this->pageMapBuilderInterfaceMock,
            [],
            $this->localeTransferMock
        );
    }
}
