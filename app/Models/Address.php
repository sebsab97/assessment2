<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
	protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'addr_1',
        'addr_2',
        'postcode',
        'city',
        'state',
    ];
}
