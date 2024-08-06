<?php
namespace Budgetcontrol\Seeds\Resources;
/**
 * Class Migration
 * 
 * This class is responsible for running migrations and managing migration classes.
 */
class Migration {
    
    /**
     * Run all migrations
     * 
     * This method runs all the migration classes found in the Migrations directory.
     * It creates an instance of each migration class and calls the `seed()` method on it.
     */
    public function runAllMigrations() {
        $migrationClasses = $this->getMigrationClasses();

        foreach ($migrationClasses as $migrationClass) {
            $seedObject = new $migrationClass();
            $seedObject->seed();
        }
    }

    /**
     * Run a specific migration
     * 
     * @param string $migrationName The name of the migration to run
     * @return object The instance of the migration class
     * @throws \Exception If the migration class with the given name is not found
     */
    public function runMigration($migrationName) {
        $migrationClasses = $this->getMigrationClasses();

        $migrationClass = array_filter($migrationClasses, function ($migrationClass) use ($migrationName) {
            return $migrationClass === $migrationName;
        });

        if (count($migrationClass) === 0) {
            throw new \Exception("Migration $migrationName not found");
        }

        return new $migrationClass[0];
    }

    /**
     * Get migration classes
     * 
     * This method scans the Migrations directory and returns an array of migration class names.
     * It filters out non-PHP files and excludes the "." and ".." directories.
     * The migration class names are prefixed with "Seeds\".
     * 
     * @return array An array of migration class names
     */
    private function getMigrationClasses() {
        $seedDirectory = __DIR__ . '/Migrations';

        $seedFiles = scandir($seedDirectory);

        $seedFiles = array_filter($seedFiles, function ($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file !== '.' && $file !== '..';
        });

        $migrationClasses = array_map(function ($file) use ($seedDirectory) {
            $className = pathinfo($file, PATHINFO_FILENAME);
            return "Seeds\\$className";
        }, $seedFiles);

        return $migrationClasses;
    }
}