<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id', 'address_line_1', 'address_line_2', 'city','postcode','company_type','website','company_phone','lowest_purchase_price','highest_purchase_price','age_range_from','age_range_to'
       ,'mileage_from','mileage_to','how_far_distance','purchase_each_month_vehicles','all_makes','specific_makes','any_thing_else'
    ];
}
