<?php
declare(strict_types=1);


namespace Lpp\Service\Mapper;


use Lpp\Entity\Brand;

final class BrandMapper
{
    private ItemMapper $itemMapper;

    public function __construct()
    {
        $this->itemMapper = new ItemMapper();
    }

    public function map(int $brandId, array $rawBrand): Brand
    {
        $itemEntityCollection = [];
        foreach ($rawBrand['items'] as $itemId => $rawItem) {
            $itemEntityCollection[] = $this->itemMapper->map($itemId, $rawItem);
        }

        return new Brand($brandId, $rawBrand['name'], $rawBrand['description'], ...$itemEntityCollection);
    }
}