<?php
declare(strict_types=1);


namespace Lpp\Entity;


use DateTime;
use InvalidArgumentException;

/**
 * Represents a single price from a search result related to a single item.
 */
final class Price
{
    private int $id;
    private string $description;

    /**
     * Price in euro
     */
    private int $priceInEuro;

    /**
     * Warehouse's arrival date (to)
     */
    private DateTime $arrivalDate;

    /**
     * Due to date, defining how long will the item be available for sale (i.e. in a collection)
     */
    private DateTime $dueDate;

    public function __construct(int $id, string $description, int $priceInEuro, DateTime $arrivalDate, DateTime $dueDate)
    {
        if (empty(trim($description))) {
            throw new InvalidArgumentException('Description name cannot be an empty string');
        }

        if ($priceInEuro <= 0) {
            throw new InvalidArgumentException('Price must be greater than 0');
        }

        $this->id = $id;
        $this->description = $description;
        $this->priceInEuro = $priceInEuro;
        $this->arrivalDate = $arrivalDate;
        $this->dueDate = $dueDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPriceInEuro(): int
    {
        return $this->priceInEuro;
    }

    public function getArrivalDate(): DateTime
    {
        return $this->arrivalDate;
    }

    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

}
