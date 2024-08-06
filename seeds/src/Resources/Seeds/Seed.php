<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Illuminate\Database\Eloquent\Model;

abstract class Seed
{
    abstract public static function run() : void;

    /**
     * Create a new seed entry.
     *
     * @param EntryInterface $interface The entry interface.
     * @param array $data The data for the seed entry.
     * @return void
     */
    public static function create(string $model, array $data)
    {
        $model::create($data);
    }
}