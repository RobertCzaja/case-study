<?php
declare(strict_types=1);


namespace Lpp\Exception;


use Exception;

final class InvalidUrlException extends Exception
{
    public function __construct(string $invalidUrl)
    {
        parent::__construct("Given url ($invalidUrl) is invalid");
    }
}