<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model implements EntryInterface
{
    protected $table = 'payment_types';
}