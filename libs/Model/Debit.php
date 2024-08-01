<?php
namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\Entity\Entry as EntryType;

class Debit extends Entry
{
    protected $table = 'entries';

    public function __construct(array $attributes = [])
    {

        $this->setAttribute('type', EntryType::transfer->value);
        $this->setAttribute('payee_id', null);
        $this->setAttribute('category_id', 55);
        $this->setAttribute('transfer', 0);
        
        parent::__construct($attributes);
    }
}