<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model implements EntryInterface
{
    protected $table = 'categories';
}