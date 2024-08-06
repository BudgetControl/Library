<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Entity\Entry as EntryType;
use \DateTime;

class TransferSeeds extends Seed
{

    public static function run() : void
    {
        $dateTime = new DateTime();
        
        $payee = [
            [
                "amount" => -300,
                "note" => "test",
                "category_id" => 12,
                "account_id" => 4,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'type' => EntryType::transfer->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'transfer_id' => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'transfer_relation' => 'f7b3b3b0-0b7b-11ec-82a8-0242ac130004',
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            ],
            [
                "amount" => 300,
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::transfer->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'transfer_id' => 4,
                'transfer_relation' => 'f7b3b3b0-0b7b-11ec-82a8-0242ac139903',
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            ],

            [
                "amount" => -300,
                "note" => "test",
                "category_id" => 12,
                "account_id" => 4,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'type' => EntryType::transfer->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'transfer_id' => 1,
                'transfer_relation' => 'f7b3b3b0-0b7b-11ec-82a8-0242ac130012',
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            ],
            [
                "amount" => 300,
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "end_date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "date_time" => $dateTime->modify("+20 days")->format('Y-m-d H:i:s'),
                "label" => [],
                "waranty" => 1,
                "confirmed" => 1,
                'type' => EntryType::transfer->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'transfer_id' => 4,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'transfer_relation' => 'f7b3b3b0-0b7b-11ec-82a8-0242ac130443',
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            ],
        ];

        foreach ($payee as $payee) {
            $payee['amount'] = $payee['amount'] * -1;
            \Budgetcontrol\Library\Model\Transfer::create($payee);
        }
    }
}
