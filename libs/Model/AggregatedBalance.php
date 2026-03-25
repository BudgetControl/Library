<?php
namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\Model\BaseModel;

class AggregatedBalance extends Wallet implements EntryInterface
{
    protected $table = 'aggregated_balances';

    protected $fillable = [];

}