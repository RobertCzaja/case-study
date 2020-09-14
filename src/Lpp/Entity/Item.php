<?php
declare(strict_types=1);


namespace Lpp\Entity;


use InvalidArgumentException;
use Lpp\Exception\InvalidUrlException;
use Lpp\Validator\UrlValidator;

/**
 * Represents a single item from a search result.
 */
final class Item
{
    private int $id;
    private string $name;
    private string $url;

    /**
     * Unsorted list of prices received from the actual search query.
     * @var Price[]
     */
    private iterable $prices;

    public function __construct(int $id, string $name, string $url, Price ...$prices)
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException('Given name cannot be an empty string');
        }

        if (false === UrlValidator::isValid($url)) {
            throw new InvalidUrlException($url);
        }

        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->prices = $prices;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return Price[]
     */
    public function getPrices(): iterable
    {
        return $this->prices;
    }

}
