<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;
use Budgetcontrol\Library\Model\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Budgetcontrol\Library\ValueObject\BudgetConfiguration;

class Budget extends BaseModel implements EntryInterface
{
    protected $table = 'budgets';

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'name',
        'amount',
        'description',
        'uuid',
        'configuration',
        'workspace_id'
    ];

    public function configuration(): Attribute
    {
        $casting = function($value) {
            $data = json_decode($value, true);
            return BudgetConfiguration::create(
                $data['tags'],
                $data['types'],
                $data['period'],
                $data['accounts'],
                $data['categories'],
                $data['period_end'],
                $data['period_start']
            );
        };

        return Attribute::make(
            get: fn (string $value) => $casting($value),
            set: fn (BudgetConfiguration $value) => $value->__toString(),
        );
    }
}
