<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends BaseModel implements EntryInterface
{
    protected $table = 'payments_types';
}