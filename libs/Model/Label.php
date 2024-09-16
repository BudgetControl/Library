<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends BaseModel implements EntryInterface
{
    use SoftDeletes;
    protected $table = 'labels';

        /**
 * The users that belong to the role.
     */
    public function entries()
    {
        return $this->belongsToMany(Entry::class, 'entry_labels');
    }
}