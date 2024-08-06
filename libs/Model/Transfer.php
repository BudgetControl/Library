<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Budgetcontrol\Library\Entity\Entry as EntryType;

class Transfer extends Entry
{
    protected $table = 'entries';

    public function __construct(array $attributes = [])
    {
        $this->setAttribute('type', EntryType::transfer->value);
        $this->setAttribute('payee_id', null);
        $this->setAttribute('transfer', 1);
        $this->setAttribute('category_id', 75);

        parent::__construct($attributes);

    }

    protected function categoryId(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 75,
            set: fn (string $value) => 75,
        );
    }

}