<?php
declare(strict_types=1);


namespace Lpp\Service\Mapper;


use Lpp\Entity\Item;

final class ItemMapper
{
    private PriceMapper $priceMapper;

    public function __construct()
    {
        $this->priceMapper = new PriceMapper();
    }

    public function map(int $itemId, array $rawItem): Item
    {
        $priceEntityCollection = [];
        foreach ($rawItem['prices'] as $priceId => $rawPrice) {
            $priceEntityCollection[] = $this->priceMapper->map($priceId, $rawPrice);
        }

        return new Item($itemId, $rawItem['name'], $rawItem['url'], ...$priceEntityCollection);
    }
}