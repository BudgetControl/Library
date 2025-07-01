<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $table = 'goals';

     protected $fillable = [
        'uuid',
        'name',
        'description',
        'amount',
        'currency',
        'workspace_id',
        'account_id',
        'type',
        'status',
    ];

    public function entries()
    {
        return $this->hasMany(Entry::class, 'goal_id');
    }

}