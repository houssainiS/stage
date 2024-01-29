<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pr extends Model
{
    use HasFactory;
    protected $fillable = [
        'PR_id',
        'PR_line_id',
        'PR_reference',
        'sentBy',
        'project_name',
        'project_code',
        'division_name',
        'cost_center',
        'direct_supervisor',
        'direct_supervisor_signature',
        'DH',
        'BOD1',
        'BOD2',
        'BOD1_signature',
        'BOD2_signature',
        'executive_director',
        'executive_director2',
        'approval_date',
        'description',
        'quantity',
        'unit',
        'SRDR',
        'GCR',
        'explanation'
    ];
}
