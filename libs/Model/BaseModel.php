<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\Exceptions\InvalidAppKeyException;

class BaseModel extends \Illuminate\Database\Eloquent\Model
{
    protected string $key;

    public function __construct()
    {
        if(!isset($_ENV['APP_KEY'])) {
            throw new InvalidAppKeyException();
        }

        $this->key = $_ENV['APP_KEY'];

        parent::__construct();
    }

}