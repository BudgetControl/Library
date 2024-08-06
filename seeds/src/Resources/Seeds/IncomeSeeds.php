<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Entity\Entry as EntryType;
use \DateTime;

class IncomeSeeds extends Seed
{

    public static function run() : void
    {
        $dateTime = new DateTime();
        
        $incomes = [
            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "date_time" => $dateTime->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],
            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],

            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "date_time" => $dateTime->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],

            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "date_time" => $dateTime->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],
            [
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "date_time" => $dateTime->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' =>  'd373d245-512d-4bff-b414-9d59781be3ee',
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],
        ];

        foreach ($incomes as $income) {
            \Budgetcontrol\Library\Model\Income::create($income);
        }
    }
}
