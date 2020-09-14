<?php
declare(strict_types=1);


namespace Lpp\Service;


use Lpp\Exception\CollectionNameNotMappedException;

final class CollectionNameResolver
{
    /**
     * Maps from collection name to the id for the item service.
     * @var int[]
     */
    private array $collectionNameToIdMapping;

    /**
     * CollectionNameResolver constructor.
     * @param int[] $collectionNameToIdMapping
     */
    public function __construct(array $collectionNameToIdMapping)
    {
        $this->collectionNameToIdMapping = $collectionNameToIdMapping;
    }

    public function getCollectionId(string $collectionName): int
    {
        if (false === array_key_exists($collectionName, $this->collectionNameToIdMapping)) {
            throw new CollectionNameNotMappedException($collectionName);
        }

        return $this->collectionNameToIdMapping[$collectionName];
    }
}