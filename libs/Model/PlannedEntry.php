<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Budgetcontrol\Library\Definition\Format;

class PlannedEntry extends Entry implements EntryInterface
{
    use SoftDeletes;
    protected $table = 'planned_entries';

    protected $hidden = ['id'];

    protected $fillable = [
        'date_time',
        'updated_at',
        'created_at',
        'uuid',
        'amount',
        'note',
        'type',
        'category_id',
        'account_id',
        'transfer_id',
        'transfer_relation',
        'currency_id',
        'payment_type',
        'payee_id',
        'deleted_at',
        'workspace_id',
        'planning'
    ];

    protected function endDateTime(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => is_null($value) ? null : Carbon::parse($value)->format(Format::dateTime->value),
            set: fn (?string $value) => is_null($value) ? null : Carbon::parse($value)->format(Format::dateTime->value),
        );
    }

    /**
     * The users that belong to the role.
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class, 'planned_entry_labels','planned_entry_id', 'labels_id');
    }
}
