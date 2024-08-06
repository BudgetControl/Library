<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\Wallet;

class WalletSeeds extends Seed
{

    public static function run() : void
    {
        $wallets = [
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => "2024-07-11 13:45:00",
                "closing_date" => "2024-07-04 13:45:00",
                "payment_account" => 1,
                "type" => "credit-card-revolving",
                "installement_value" => 400,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => "2024-07-11 13:45:00",
                "closing_date" => "2024-07-04 13:45:00",
                "payment_account" => 1,
                "type" => "credit-card",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => null,
                "closing_date" => null,
                "payment_account" => 1,
                "type" => "bank",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => null,
                "closing_date" => null,
                "payment_account" => 1,
                "type" => "cache",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => null,
                "closing_date" => null,
                "payment_account" => 1,
                "type" => "investment",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => null,
                "closing_date" => null,
                "payment_account" => 1,
                "type" => "loan",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => null,
                "closing_date" => null,
                "payment_account" => 1,
                "type" => "other",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
            [
                "name" => "test",
                "color" => "#e6e632ff",
                "invoice_date" => null,
                "closing_date" => null,
                "payment_account" => 1,
                "type" => "prepaid-card",
                "installement_value" => null,
                "currency" => 2,
                "balance" => 0,
                "exclude_from_stats" => false,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "workspace_id" => 1
            ],
        ];

        foreach ($wallets as $wallet) {
            Wallet::create($wallet);
        }
    }
}
