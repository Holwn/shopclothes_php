<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}