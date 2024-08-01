<?php
namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\Entity\Entry as EntryType;

class Expense extends Entry
{
    protected $table = 'entries';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setAttribute('type', EntryType::expenses->value);
        $this->setAttribute('transfer', false);
        $this->setAttribute('transfer_id', null);
        $this->setAttribute('payee_id', null);
    }
}