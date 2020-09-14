<?php

namespace Lpp\Service;

use Lpp\Entity\Brand;

/**
 * Represents the connection to a specific item store.
 * For the case study we will pretend we have only one item store to make things easier.
 */
interface ItemServiceInterface
{   
    /**
     * This method should read from a datasource (JSON for case study)
     * and should return an unsorted list of brands found in the datasource.
     *
     * @return Brand[]
     */
    public function getResultForCollectionId(int $collectionId): iterable;
}
