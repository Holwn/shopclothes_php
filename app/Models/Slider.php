<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table='slider';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}