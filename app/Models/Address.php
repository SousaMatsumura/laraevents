<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'street',
        'number',
        'uf',
        'city',
        'district',
        'complement',
        'user_id'

    ];

    //relationships
    public function user(){
        return $this->belongsTo(User::class);
    }
}
