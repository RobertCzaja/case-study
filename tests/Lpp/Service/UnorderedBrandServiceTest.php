<?php
declare(strict_types=1);


namespace Lpp\Test\Service;


use Lpp\Entity\Brand;
use Lpp\Entity\Item;
use Lpp\Exception\CollectionNameNotMappedException;
use Lpp\Service\CollectionNameResolver;
use Lpp\Service\FileReader;
use Lpp\Service\ItemService;
use Lpp\Service\Mapper\BrandMapper;
use Lpp\Service\UnorderedBrandService;
use PHPUnit\Framework\TestCase;

final class UnorderedBrandServiceTest extends TestCase
{
    private UnorderedBrandService $unorderedBrandService;

    protected function setUp(): void
    {
        $this->unorderedBrandService = new UnorderedBrandService(
            new ItemService(new FileReader(), new BrandMapper()),
            new CollectionNameResolver(["winter" => 1315475])
        );
    }

    public function testWhenGivenCollectionNameIsNotMappedGetBrandsForCollectionThrowsException(): void
    {
        $this->expectException(CollectionNameNotMappedException::class);
        $this->unorderedBrandService->getBrandsForCollection("not-mapped-collection-name");
    }

    public function testMethodGetBrandsForCollectionReturnsBrandsEntityCollectionWhenCollectionNameIsMapped(): void
    {
        $brands = $this->unorderedBrandService->getBrandsForCollection('winter');

        $this->assertContainsOnlyInstancesOf(Brand::class, $brands);
    }

    public function testMethodGetItemsForCollectionReturnsCollectionOfItemEntity(): void
    {
        $items = $this->unorderedBrandService->getItemsForCollection('winter');

        $this->assertContainsOnlyInstancesOf(Item::class, $items);
    }

}