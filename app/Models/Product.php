<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}