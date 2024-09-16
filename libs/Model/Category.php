<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel implements EntryInterface
{
    protected $table = 'categories';
}