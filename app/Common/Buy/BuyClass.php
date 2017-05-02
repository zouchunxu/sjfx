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

    public function __construct(Ware $ware, User $user)
    {
        $this->ware = $ware;
        $this->user = $user;
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