<?php
namespace Budgetcontrol\Seeds\Resources;

use Budgetcontrol\Seeds\Resources\Seeds\BudgetSeed;
use Budgetcontrol\Seeds\Resources\Seeds\CategorySeeders;
use Budgetcontrol\Seeds\Resources\Seeds\CurrencySeeders;
use Budgetcontrol\Seeds\Resources\Seeds\DebitSeeds;
use Budgetcontrol\Seeds\Resources\Seeds\ExpenseSeeds;
use Budgetcontrol\Seeds\Resources\Seeds\IncomeSeeds;
use Budgetcontrol\Seeds\Resources\Seeds\LabelSeeders;
use Budgetcontrol\Seeds\Resources\Seeds\ModelsSeed;
use Budgetcontrol\Seeds\Resources\Seeds\PayeesSeed;
use Budgetcontrol\Seeds\Resources\Seeds\PaymentTypeSeeders;
use Budgetcontrol\Seeds\Resources\Seeds\PlannedEntriesSeed;
use Budgetcontrol\Seeds\Resources\Seeds\TransferSeeds;
use Budgetcontrol\Seeds\Resources\Seeds\UserSeeds;
use Budgetcontrol\Seeds\Resources\Seeds\WalletSeeds;
use Budgetcontrol\Seeds\Resources\Seeds\WorkspaceSeeds;

/**
 * Represents a seed for generating test data.
 */
class Seed {
    
    /**
     * Runs all the seeds.
     *
     * @return void
     */
    public function runAllSeeds() {

        // firs run User seed and then Workspace
        UserSeeds::run();
        CategorySeeders::run();
        PaymentTypeSeeders::run();
        CurrencySeeders::run();
        WorkspaceSeeds::run();
        LabelSeeders::run();
        WalletSeeds::run();
        IncomeSeeds::run();
        ExpenseSeeds::run();
        TransferSeeds::run();
        PayeesSeed::run();
        DebitSeeds::run();
        ModelsSeed::run();
        PlannedEntriesSeed::run();
        BudgetSeed::run();

    }

    /**
     * Runs a seed with the given seed name.
     *
     * @param string $seedName The name of the seed to run.
     * @return void
     */
    public function runSeed(string $seedName) {
        $seedClasses = $this->getSeedClasses();

        $seedClass = array_filter($seedClasses, function ($seedClass) use ($seedName) {
            return $seedClass === $seedName;
        });

        if (count($seedClass) === 0) {
            throw new \Exception("seed $seedName not found");
        }

        return new $seedClass[0];
    }

    /**
     * Retrieves the seed classes.
     *
     * @return array The seed classes.
     */
    private function getSeedClasses() {
        $seedDirectory = __DIR__ . '/Seeds';

        $seedFiles = scandir($seedDirectory);

        $seedFiles = array_filter($seedFiles, function ($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file !== '.' && $file !== '..';
        });

        $seedClasses = array_map(function ($file) use ($seedDirectory) {
            $className = pathinfo($file, PATHINFO_FILENAME);
            return "Budgetcontrol\\Seeds\\Resources\\Seeds\\$className";
        }, $seedFiles);

        return $seedClasses;
    }
}