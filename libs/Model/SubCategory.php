<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends BaseModel implements EntryInterface
{
    use SoftDeletes;
    
    protected $table = 'sub_categories';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}