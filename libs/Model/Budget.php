<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model implements EntryInterface
{
    protected $table = 'budgets';

    protected $fillable = [
        'name',
        'amount',
        'description',
        'uuid',
        'configuration',
        'workspace_id'
    ];
}