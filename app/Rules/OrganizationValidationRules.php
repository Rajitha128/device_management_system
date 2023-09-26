<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Organization;
use App\Models\Location;
use App\Models\Device;

class OrganizationValidationRules
{
    public static function maxLocationsPerOrganization(): Rule
    {
        return new class implements Rule {
            public function passes($attribute, $value)
            {
                $organization = Organization::find($value);

                if (!$organization) {
                    return false;
                }

                return $organization->locations()->count() <= 5;//can use config to set this value
            }

            public function message()
            {
                return 'The organization has reached the maximum number of allowed locations (5).';
            }
        };
    }

    public static function maxDevicesPerLocation(): Rule
    {
        return new class implements Rule {
            public function passes($attribute, $value)
            {
                $location = Location::find($value);

                if (!$location) {
                    return false;
                }

                return $location->devices()->count() <= 10;//can use config to set this value
            }

            public function message()
            {
                return 'The location has reached the maximum number of allowed devices (10).';
            }
        };
    }
}
