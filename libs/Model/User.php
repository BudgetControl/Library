<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements EntryInterface
{
    use SoftDeletes, HasFactory;
    
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'uuid',
        'password',
    ];
}