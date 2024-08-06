<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Entity\Entry as EntryType;
use \DateTime;

class DebitSeeds extends Seed
{

    public static function run() : void
    {
        $dateTime = new DateTime();

        $payee = [
            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 4,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" =>  $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" =>  $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'type' => EntryType::debit->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'payee_id' => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            ],
            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 4,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" =>  $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" =>  $dateTime->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::debit->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'payee_id' => 1,
            ],
            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 4,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" =>  $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" =>  $dateTime->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::debit->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'payee_id' => 1,
            ],
        ];

        foreach ($payee as $payee) {
            $payee['amount'] = $payee['amount'] * -1;
            \Budgetcontrol\Library\Model\Debit::create($payee);
        }
    }
}
