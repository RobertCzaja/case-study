<?php
declare(strict_types=1);


namespace Lpp\Test\Service;


use Lpp\Service\CollectionNameResolver;
use Lpp\Service\FileReader;
use Lpp\Service\NameOrderedBrandService;
use Lpp\Service\ItemService;
use Lpp\Service\Mapper\BrandMapper;
use PHPUnit\Framework\TestCase;

final class NameOrderedBrandServiceTest extends TestCase
{
    private NameOrderedBrandService $nameOrderedBrandService;
    
    protected function setUp()
    {
        $this->nameOrderedBrandService = new NameOrderedBrandService(
            new ItemService(new FileReader(), new BrandMapper()),
            new CollectionNameResolver(["winter" => 1315475])
        );
    }

    public function testMethodGetItemsForCollectionReturnsItemsSortedAscByName(): void
    {
        $items = $this->nameOrderedBrandService->getItemsForCollection('winter');

        $itemsNamesInExpectedOrder = array_keys($items);
        ksort($itemsNamesInExpectedOrder);

        $this->assertSame($itemsNamesInExpectedOrder, array_keys($items));
    }

    public function testMethodGetBrandsForCollectionReturnsBrandsSortedAscByName(): void
    {
        $brands = $this->nameOrderedBrandService->getBrandsForCollection('winter');

        $brandsNamesInExpectedOrder = array_keys($brands);
        ksort($brandsNamesInExpectedOrder);

        $this->assertSame($brandsNamesInExpectedOrder, array_keys($brands));
    }

}