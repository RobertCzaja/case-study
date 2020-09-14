<?php
declare(strict_types=1);


namespace Lpp\Service;



final class NameOrderedBrandService implements BrandServiceInterface
{
    private ItemServiceInterface $itemService;
    private CollectionNameResolver $collectionNameResolver;

    public function __construct(
        ItemServiceInterface $itemService,
        CollectionNameResolver $collectionNameResolver
    ) {
        $this->itemService = $itemService;
        $this->collectionNameResolver = $collectionNameResolver;
    }

    /**
     * @inheritDoc
     */
    public function getItemsForCollection(string $collectionName): array
    {
        $brands = $this->itemService->getResultForCollectionId(
            $this->collectionNameResolver->getCollectionId($collectionName)
        );

        $items = [];
        foreach ($brands as $brand) {
            foreach ($brand->getItems() as $item) {
                $items[$item->getName()] = $item;
            }
        }
        ksort($items);

        return $items;
    }

    /**
     * @inheritDoc
     */
    public function getBrandsForCollection(string $collectionName): array
    {
        $brands = $this->itemService->getResultForCollectionId(
            $this->collectionNameResolver->getCollectionId($collectionName)
        );

        $sortedBrands = [];
        foreach ($brands as $brand) {
            $sortedBrands[$brand->getName()] = $brand;
        }

        ksort($sortedBrands);

        return $sortedBrands;
    }
}