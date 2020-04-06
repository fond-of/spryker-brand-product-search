<?php

namespace FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearch;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class BrandProductMapExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProductSearch\Communication\Plugin\ProductPageSearch\BrandProductMapExpanderPlugin
     */
    protected $brandProductMapExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PageMapTransfer
     */
    protected $pageMapTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface
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
    public function testExpandProductPageMap(): void
    {
        $this->assertInstanceOf(PageMapTransfer::class, $this->brandProductMapExpanderPlugin->expandProductPageMap(
            $this->pageMapTransferMock,
            $this->pageMapBuilderInterfaceMock,
            $this->productData,
            $this->localeTransferMock
        ));
    }

    /**
     * @return void
     */
    public function testExpandProductPageMapNoProductBrand(): void
    {
        $this->assertInstanceOf(PageMapTransfer::class, $this->brandProductMapExpanderPlugin->expandProductPageMap(
            $this->pageMapTransferMock,
            $this->pageMapBuilderInterfaceMock,
            [],
            $this->localeTransferMock
        ));
    }
}
