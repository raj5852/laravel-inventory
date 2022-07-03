<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryreport extends Model
{
    use HasFactory;
    protected $fillable = ['delverie_id','productname','weigth','size'];
}
