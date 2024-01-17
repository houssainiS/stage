<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itrequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'requestor_id',
        'reference',
        'description1',
        'description2',
        'description3',
        'description4',
        'quantity1',
        'quantity2',
        'quantity3',
        'quantity4',
        'remarks1',
        'remarks2',
        'remarks3',
        'remarks4',
        'signature',
        'DH_approval',
        'DH_approval_date',
        'BOD1_approval',
        'BOD1_approval_date',
        'AMLC_approval',
        'AMLC_approval_date',
        'AMLC_found',
        'AMLC_found_date',
        'price',
        'BOD2_approval',
        'BOD2_approval_date',
    ];
}
