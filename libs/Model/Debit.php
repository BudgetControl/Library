<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Budgetcontrol\Library\Entity\Entry as EntryType;

class Debit extends Entry
{
    protected $table = 'entries';

    public function __construct(array $attributes = [])
    {

        $this->setAttribute('type', EntryType::debit->value);
        $this->setAttribute('category_id', 55);
        $this->setAttribute('transfer', 0);
        
        parent::__construct($attributes);
    }


    protected function categoryId(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 55,
            set: fn (string $value) => 55,
        );
    }
}