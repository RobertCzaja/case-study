<?php
declare(strict_types=1);


namespace Lpp\Entity;


use InvalidArgumentException;

/**
 * Represents a single brand in the result.
 */
final class Brand
{
    private int $id;
    private string $name;
    private string $description;

    /**
     * Unsorted list of items with their corresponding prices.
     * @var Item[]
     */
    private iterable $items;

    public function __construct(int $id, string $name, string $description, Item ...$items)
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException('Brand name cannot be an empty string');
        }

        if (empty(trim($description))) {
            throw new InvalidArgumentException('Brand description cannot be an empty string');
        }

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->items = $items;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Item[]
     */
    public function getItems(): iterable
    {
        return $this->items;
    }

}
