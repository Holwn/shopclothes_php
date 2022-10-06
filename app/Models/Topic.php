<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table='topic';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}