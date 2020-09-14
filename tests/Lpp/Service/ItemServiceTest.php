<?php
declare(strict_types=1);


namespace Lpp\Test\Service;


use Lpp\Entity\Brand;
use Lpp\Service\FileReader;
use Lpp\Service\ItemService;
use Lpp\Service\Mapper\BrandMapper;
use PHPUnit\Framework\TestCase;

final class ItemServiceTest extends TestCase
{
    /**
     * @var int
     */
    private const COLLECTION_ID = 1315475;

    private ItemService $itemService;

    protected function setUp(): void
    {
        $this->itemService = new ItemService(new FileReader(), new BrandMapper());
    }

    public function testGetResultForCollectionIdMethodsReturnsCollectionOfBrandEntities(): void
    {
        $brands = $this->itemService->getResultForCollectionId(self::COLLECTION_ID);

        $this->assertContainsOnlyInstancesOf(Brand::class, $brands);
    }

}