<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $table = 'goals';

    public function entries()
    {
        return $this->hasMany(Entry::class, 'goal_id');
    }

}