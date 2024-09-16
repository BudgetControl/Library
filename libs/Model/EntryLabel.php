<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryLabel extends BaseModel implements EntryInterface
{
    use SoftDeletes;
    protected $table = 'entry_labels';
}