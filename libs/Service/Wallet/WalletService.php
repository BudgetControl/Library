<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\Service\Wallet;

use Budgetcontrol\Library\Model\Wallet;
use Budgetcontrol\Library\Model\Entry;
use Webit\Wrapper\BcMath\BcMathNumber;
use Budgetcontrol\Library\Model\EntryInterface;

class WalletService {

    protected EntryInterface $entry;
    protected ?Entry $oldEntry = null;
    protected bool $revert = false;

    public function __construct(EntryInterface $entry)
    {
        $this->entry = $entry;
        $entryDB = Entry::WithRelations()->where('id', $entry->id)->first();
        if (!is_null($entryDB)) {
            $this->oldEntry = $entryDB;
        }
    }

    /**
     * update balance
     * 
     * @return void
     */
    public function sum(): void
    {
        //first check if is confirmed
        if ($this->entry->confirmed == true) {
            // now check if is planned
            if ($this->entry->planned == false) {
                $entry = $this->entry;

                $amount = $entry->amount;
                $account = $entry->wallet->id;

                //update balance
                $this->update($amount, $account);
            }
        }

        $this->revert();
    }

    /**
     * update balance
     * 
     * @return void
     */
    public function subtract(): void
    {

        if ($this->entry->confirmed === true) {
            // now check if is planned
            if ($this->entry->planned === false) {
                $entry = $this->entry;

                $amount = $entry->amount;
                $account = $entry->wallet->id;

                //update balance
                $amount = $amount * -1;
                $this->update($amount, $account);
            }
        }
    }

    /**
     * chek if entry is planned type
     */
    protected function checkPlanned(): bool
    {
        if (!is_null($this->oldEntry)) {
            if ($this->oldEntry->planned == false && $this->entry->planned == true) {
                return true;
            }
        }

        return false;
    }

    /**
     * chek if entry is confirmet type
     */
    protected function checkConfirmed(): bool
    {
        if (!is_null($this->oldEntry)) {
            if ($this->oldEntry->confirmed == true && $this->entry->confirmed == false) {
                return true;
            }
        }

        return false;
    }

    /**
     * chek if entry is confirmet type
     */
    protected function checkamount(): bool
    {
        if (!is_null($this->oldEntry)) {
            if ($this->oldEntry->amount != $this->entry->amount &&  ($this->oldEntry->confirmed == true && $this->oldEntry->planned == false)) {
                return true;
            }
        }

        return false;
    }

    /**
     * is account changed
     */
    protected function checkAccount()
    {
        if (!is_null($this->oldEntry)) {
            if ($this->oldEntry->account != $this->entry->wallet && ($this->oldEntry->confirmed == true && $this->oldEntry->planned == false)) {
                return true;
            }
        }

        return false;
    }

    /**
     * is to revert
     */
    protected function isRevert(): bool
    {
        if ($this->checkConfirmed() || $this->checkPlanned() || $this->checkAccount() || $this->checkamount()) { //
            return true;
        }

        return false;
    }


    /**
     * Reverts the changes made by the update balance operation.
     *
     * @return void
     */
    protected function revert()
    {
        $revert = $this->isRevert();

        if ($revert === true) {
            self::updateBalance($this->oldEntry->amount * -1, $this->oldEntry->account_id);
        }
    }


    /**
     * Updates the balance of a wallet account.
     *
     * @param float $amount The amount to update the balance by.
     * @param int $account The ID of the account to update.
     * @return void
     */
    protected function update(float $amount, int $account)
    {
        WalletService::updateBalance($amount, $account);
    }

    /**
     * update balance
     * @param float $amount
     * @param int $account_id
     * 
     * @return void
     */
    public static function updateBalance(float $amount, int $account_id):void
    {
        $account = Wallet::findOrFail($account_id);
        $wallet = new BcMathNumber($account->balance);
        $wallet->add($amount);

        $account->balance = $wallet->getValue();
        $account->save();
    }
}