<?php

namespace Lpp\Service;

use Lpp\Entity\Brand;
use Lpp\Entity\Item;
use Lpp\Exception\CollectionNameNotMappedException;

/**
 * The implementation is responsible for resolving the id of the collection from the given collection name.
 *
 * Second responsibility is to sort the returning result from the item service in whatever way. 
 * 
 * Please write in the case study's summary if you find this approach correct or not. In both cases explain why.
 */
interface BrandServiceInterface
{
    /**
     * @param string $collectionName Name of a collection to search for
     * @return Item[]
     * @throws CollectionNameNotMappedException
     */
    public function getItemsForCollection(string $collectionName): array;

    /**
     * @param string $collectionName
     * @return Brand[]
     * @throws CollectionNameNotMappedException
     */
    public function getBrandsForCollection(string $collectionName): array;
}
