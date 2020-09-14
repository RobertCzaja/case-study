<?php
declare(strict_types=1);


namespace Lpp\Service\Mapper;


use DateTime;
use Lpp\Entity\Price;

final class PriceMapper
{
    public function map(int $priceId, array $rawPrice): Price
    {
        return new Price(
            $priceId,
            $rawPrice['description'],
            $rawPrice['priceInEuro'],
            new DateTime($rawPrice['arrival']),
            new DateTime($rawPrice['due'])
        );
    }
}