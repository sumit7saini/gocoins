<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;
    protected $table = 'vendor';

    protected $fillable = [
        'vendorId',
        'vendorName',
        'vendorLogo',
        'vendorDescription',
        'vendorEmail',
    ];
}
