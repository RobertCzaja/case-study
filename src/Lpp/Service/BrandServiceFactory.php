<?php
declare(strict_types=1);


namespace Lpp\Service;


final class BrandServiceFactory
{
    /**
     * @var bool
     */
    public const SORT_BY_ITEM_NAME = true;

    private ItemServiceInterface $itemService;
    private CollectionNameResolver $collectionNameResolver;

    public function __construct(ItemServiceInterface $itemService, CollectionNameResolver $collectionNameResolver)
    {
        $this->itemService = $itemService;
        $this->collectionNameResolver = $collectionNameResolver;
    }

    public function getInstance(bool $sortByName = false): BrandServiceInterface
    {
        return $sortByName
            ? new NameOrderedBrandService($this->itemService, $this->collectionNameResolver)
            : new UnorderedBrandService($this->itemService, $this->collectionNameResolver);
    }
}