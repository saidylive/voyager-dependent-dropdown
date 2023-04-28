# Laravel voyager Dependent Dropdown

[![PHP version](https://d25lcipzij17d.cloudfront.net/badge.svg?id=ph&r=r&type=6e&v=1.0.1&x2=2)](https://packagist.org/packages/saidy/voyager-dependent-dropdown)

Voyager Dependent Dropdown Option with the help of git link <https://github.com/d3turnes/dependent-dropdown-with-voyager>

## Install

To install run the following command

```properties
composer require saidy/voyager-dependent-dropdown
php artisan vendor:publish --provider="Saidy\VoyagerDependentDropdown\Providers\VoyagerDependentServiceProvider" 
```

### Sample RelationShip method

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraineeInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'trainee_id';

    protected $table = 'trainee_info';

    public $additional_attributes = ['trainee_full_name'];

    public function getTraineeFullNameAttribute()
    {
        return "{$this->trainee_name}: ({$this->trainee_id})";
    }

    public static function postingUpazilaRelationship($id)
    {
        /**
         *
         *	return [
         *		'posting_upazila' => xxx,
         *		'division_id' => yyy,
         *		'district_id' => yyy
         *	]
         *
         */

        return
            self::where('trainee_info.trainee_id', '=', $id)
            ->select(
                'trainee_info.posting_upazila',
                'division.division_id',
                'division.division_id as posting_division',
                'district.district_id',
                'district.district_id as posting_district'
            )
            ->join('upazila', 'upazila.upazila_id', '=', 'trainee_info.posting_upazila')
            ->join('district', 'upazila.district_id', '=', 'district.district_id')
            ->join('division', 'district.division_id', '=', 'division.division_id')
            ->first();
    }
}

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
        },
        {
            "model": "App\\Models\\Upazila",
            "name": "posting_upazila",
            "display": "Posting Upazila",
            "placeholder": "Select Upazila",
            "key": "upazila_id",
            "label": "upazila_name",
            "where": "district_id"
        }
    ]
}
```
