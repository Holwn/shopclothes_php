<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menu';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}