<?php
declare(strict_types=1);


namespace Lpp\Service;


final class UnorderedBrandService implements BrandServiceInterface
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
    public function getBrandsForCollection(string $collectionName): array
    {
        return $this->itemService->getResultForCollectionId(
            $this->collectionNameResolver->getCollectionId($collectionName)
        );
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
                $items[] = $item;
            }
        }
        return $items;
    }

}
