<?php
declare(strict_types=1);


namespace Lpp\Test\Validator;

use Lpp\Validator\UrlValidator;
use PHPUnit\Framework\TestCase;

final class UrlValidatorTest extends TestCase
{
    /**
     * @dataProvider validUrlsProvider
     */
    public function testGivenUrlsAreValid(string $validUrl): void
    {
        $this->assertTrue(UrlValidator::isValid($validUrl), "Given url ($validUrl) is invalid");
    }

    /**
     * @dataProvider invalidUrlsProvider
     */
    public function testGivenUrlsAreInvalid(string $invalidUrl): void
    {
        $this->assertFalse(UrlValidator::isValid($invalidUrl), "Given url ($invalidUrl) is valid");
    }

    public function validUrlsProvider(): array
    {
        return [
            ['https://www.google.com'],
            ['http://www.google.com'],
            ['https://www.google.com/search?sxsrf=ALeKk00pOmbnuifIZD8FCcn3VlAkpfDqZA%3A1600063052971&source=hp&ei=TAZfX4SROYXuabiJq9gG&q=something&oq=something&gs_lcp=CgZwc3ktYWIQAzICCAAyBQguELEDMgIILjIFCC4QsQMyAgguMgIIADICCAAyAgguMgIILjICCAA6BwgjEOoCECc6BwguEOoCECc6BQgAELEDOggIABCxAxCDAToECCMQJzoGCCMQJxATULakE1jmqxNgx64TaAFwAHgAgAHNAYgB5wqSAQUwLjguMZgBAKABAaoBB2d3cy13aXqwAQo&sclient=psy-ab&ved=0ahUKEwiE542v--frAhUFdxoKHbjECmsQ4dUDCAY&uact=5'],
        ];
    }

    public function invalidUrlsProvider(): array
    {
        return [
            ['www.google.com/'],
            ['www.com'],
            ['http:/www.google.com'],
            ['http:/www.google.com'],
            ['abc'],
            [''],
            ['  '],
        ];
    }
}