<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Budgetcontrol\Library\Entity\Entry as EntryType;
use BudgetcontrolLibs\Crypt\Traits\Hash;

class EntryKeywords extends BaseModel
{
    use Hash;

    protected $table = 'entries_keywords';

    protected $fillable = [
        'entry_id',
        'keyword',
        'score',
    ];

    public function keyword(): Attribute
    {
        $encrypt = function(string $value) {
            return $this->hash($value);
        };

        $decrypt = function(?string $value) {
            return "You cannot decrypt this value as it is hashed.";
        };

        return Attribute::make(
            get: $decrypt,
            set: $encrypt,
        );
    }

    public function entry(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Entry::class, 'entry_id', 'id');
    }

    public function getKeywordsAsArray(): array
    {
        return explode(' ', trim($this->keyword));
    }
}