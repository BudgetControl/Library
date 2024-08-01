<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model implements EntryInterface
{
    protected $table = 'currencies';
}