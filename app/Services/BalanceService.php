<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class BalanceService
{
    /**
     * @param User $user
     * @param $type
     * @param $subtype
     * @param $amount
     * @param array $detail
     * @return mixed
     */
    public function add(User $user, $type, $subtype, $amount, array $detail = []): mixed
    {
        $detail['before'] = $user->balance;
        $detail['after'] = $user->balance + $amount;
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'owner_id' => $user->user->id,
            'uuid' => md5($user->id . time() . $amount . json_encode($detail)),
            'type' => $type,
            'subtype' => $subtype,
            'detail' => $detail,
            'amount' => $amount
        ]);
        $user->update(['balance' => $detail['after']]);
        return $transaction;
    }

    /**
     * @param User $user
     * @param $subtype
     * @param $amount
     * @param array $detail
     * @return mixed
     */
    public function deposit(User $user, $subtype, $amount, array $detail = []): mixed
    {
        return $this->add($user, 'deposit', $subtype, $amount, $detail);
    }

    /**
     * @param User $user
     * @param $subtype
     * @param $amount
     * @param $detail
     * @return mixed
     */
    public function withdraw(User $user, $subtype, $amount, $detail = []): mixed
    {
        return $this->add($user, 'withdraw', $subtype, -$amount, $detail);
    }
}
