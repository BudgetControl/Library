<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlannedEntry extends Entry implements EntryInterface
{
    use SoftDeletes;
    protected $table = 'planned_entries';

    protected $hidden = ['id'];

}