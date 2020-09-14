<?php
declare(strict_types=1);


namespace Lpp\Service;


use RuntimeException;

final class FileReader
{
    public function getRawData(int $collectionId): array
    {
        $filePath = __DIR__.'/../../../data/'.$collectionId.'.json';

        if (false === file_exists($filePath)) {
            throw new RuntimeException("File $filePath doesnt exists");
        }

        if (false === $rawData = file_get_contents($filePath)) {
            throw new RuntimeException("Error occurred while reading the $filePath");
        }

        return json_decode($rawData, true);
    }
}