<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Entity\Entry as EntryType;
use DateTime;

class ModelsSeed extends Seed
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
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
                "label" => [],
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
                "label" => [],
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],

            [
                "amount" => rand(1, 1000) * -1,
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "label" => [],
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::expenses->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],
            [
                "amount" => rand(1, 1000) * -1,
                "note" => "test",
                "category_id" => 12,
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "label" => [],
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'type' => EntryType::expenses->value,
                'workspace_id' => 1,
                'account_id' => 1,
            ],
        ];

        foreach ($incomes as $income) {
            \Budgetcontrol\Library\Model\Model::create($income);
        }
        
    }
}
