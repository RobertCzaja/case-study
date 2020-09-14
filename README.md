# Case Study 
Required PHP version: `7.4`

### Implementation for `ItemServiceInterface`

Class `ItemService` is responsible for map raw JSON data to application entities. 

### Url Validator 

Static class `UrlValidator` is used in `Item` entity constructor. So if url is not valid you cannot create `Item` object.

### Introduce `CollectionNameResolver`

`UnorderedBrandService` had two responsibilities:
1. Resolving the id of the collection from the given collection name,
2. Sort the returning result from the item service in whatever way.

According to SOLID principles, class should have only one responsibility 
to be more clear, easier to reuse and maintain.

### `BrandServiceInterface` another implementation

BrandServiceInterface should be instantiate via `BrandServiceFactory`
which returns (depending on passed getInstance parameter):
* `UnorderedBrandService`
* `NameOrderedBrandService` - provides `Item` & `Brand` collections sorted ascending by name.
    

   
