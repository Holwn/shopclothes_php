<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contact';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}