# Laravel voyager Dependent Dropdown

[![PHP version](https://d25lcipzij17d.cloudfront.net/badge.svg?id=ph&r=r&type=6e&v=1.0.0&x2=2)](https://packagist.org/packages/saidy/voyager-dependent-dropdown)

Voyager Dependent Dropdown Option with the help of git link <https://github.com/d3turnes/dependent-dropdown-with-voyager>

## Install

To install run the following command

```properties
composer require saidy/voyager-dependent-dropdown
php artisan vendor:publish --provider="Saidy\VoyagerDependentDropdown\Providers\VoyagerDependentServiceProvider" 
```

### Sample Config Option

```json
{
    "model": "App\\Models\\Division",
    "name": "posting_division",
    "route": "api.v1.dropdown",
    "display": "Posting Division",
    "placeholder": "Select Division",
    "key": "division_id",
    "label": "division_name",
    "dependent_dropdown": [
        {
            "model": "App\\Models\\District",
            "name": "posting_district",
            "display": "Posting District",
            "placeholder": "Select District",
            "key": "district_id",
            "label": "district_name",
            "where": "division_id"
        }
    ]
}
```
