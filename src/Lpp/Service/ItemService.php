<?php
declare(strict_types=1);


namespace Lpp\Service;


use Lpp\Service\Mapper\BrandMapper;


final class ItemService implements ItemServiceInterface
{
    private FileReader $fileReader;
    private BrandMapper $brandMapper;

    public function __construct(FileReader $fileReader, BrandMapper $brandMapper)
    {
        $this->fileReader = $fileReader;
        $this->brandMapper = $brandMapper;
    }

    /**
     * @inheritDoc
     */
    public function getResultForCollectionId(int $collectionId): iterable
    {
        $rawData = $this->fileReader->getRawData($collectionId);

        $brandEntityCollection = [];
        foreach ($rawData['brands'] as $brandId => $rawBrand) {
            $brandEntityCollection[] = $this->brandMapper->map($brandId, $rawBrand);
        }

        return $brandEntityCollection;
    }

}