<?php
namespace App\Common;

class RedisHelp
{

    /**
     * @var \Redis
     */
    protected $redis;

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1');
    }

    public function getRedis()
    {
        return $this->redis;
    }


}