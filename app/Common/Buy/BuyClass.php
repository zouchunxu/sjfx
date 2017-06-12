<?php
namespace App\Common\Buy;

use App\Models\Ware;
use App\User;

abstract class BuyClass
{

    /**
     * @var Ware
     */
    protected $ware;

    /**
     * @var callable
     */
    protected $afterCall;

    /**
     * @var User
     */
    protected $user;

    protected $count;

    public function __construct(Ware $ware, User $user, $count = 1)
    {
        $this->ware = $ware;
        $this->user = $user;
        $this->count = $count;
    }

    public function buy()
    {
        $this->_buy();
        session(['wechatDb' => $this->user->toArray()]);
        if (is_callable($this->afterCall)) {
            $this->afterCall();
        }
    }

    protected abstract function _buy();
}