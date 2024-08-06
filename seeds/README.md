# SeedsTestLibs
Library with seeds test and migration for unit test

## How use these library:
Extens seed class of current library with your seed
```
class MySeed extends \Phinx\Seed\AbstractSeed {

    public function run(): void
    {
        $seeds = new Budgetcontrol\Seeds\Resources\Seeds();
        $seeds->runAllSeeds();
    }
}
```

## Use a test migrations
On phinx configuration insert migration library path
vendor/budgetcontrol/src/Resources/Migrations