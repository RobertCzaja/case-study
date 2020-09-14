<?php
declare(strict_types=1);


namespace Lpp\Test\Service;

use Lpp\Exception\CollectionNameNotMappedException;
use Lpp\Service\CollectionNameResolver;
use PHPUnit\Framework\TestCase;

final class CollectionNameResolverTest extends TestCase
{
    private CollectionNameResolver $collectionNameResolver;

    protected function setUp(): void
    {
        $this->collectionNameResolver = new CollectionNameResolver(["winter" => 1315475]);
    }

    /**
     * @dataProvider validMapping
     */
    public function testCheckIfMethodWorks(string $searchedCollectionName, int $expectedCollectionId): void
    {
        $this->assertSame(
            $expectedCollectionId,
            $this->collectionNameResolver->getCollectionId($searchedCollectionName)
        );
    }

    public function testThrowsExceptionOnNotExistedCollectionName(): void
    {
        $this->expectException(CollectionNameNotMappedException::class);
        $this->collectionNameResolver->getCollectionId('unknown_collection');
    }


    public function validMapping(): array
    {
        return [
            ["winter", 1315475]
        ];
    }
}