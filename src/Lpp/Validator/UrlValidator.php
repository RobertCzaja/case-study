<?php
declare(strict_types=1);


namespace Lpp\Validator;

final class UrlValidator
{
    public static function isValid(string $url): bool
    {
        return (bool) filter_var($url, FILTER_VALIDATE_URL);
    }
}