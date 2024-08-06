<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use \DateTime;

class UserSeeds extends Seed
{

    public static function run() : void
    {
        $dateTime = new DateTime();

        \Budgetcontrol\Library\Model\User::create([
            'name' => 'Mario',
            'email' => 'mario.rossi@email.it',
            'password' => 'password',
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        ]);
    }
}
