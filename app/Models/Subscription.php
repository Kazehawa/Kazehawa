<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $fillable = [
            'card_number' => 'required',
            'name' => 'required',
            'expiry_date' => 'required',
            'cvc' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',

    ];


    protected $table = 'subscriptions';
    protected $primaryKey = 'id';

    // @var array <int, string>
    
    protected $hidden = [
        'cvc',
        'card_number',

    ];


    protected $casts = [
        'cvc' => 'hashed',
        'card_number'=> 'hashed',

    ];

  

}
