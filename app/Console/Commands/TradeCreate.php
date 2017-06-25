<?php

namespace App\Console\Commands;

use App\Common\RedisHelp;
use App\Models\Trade;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class TradeCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trade:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $redis = (new RedisHelp())->getRedis();


        while (true) {
            $data = $redis->brPop('trade', 30);
            if (array_get($data, 1)) {
                $val = json_decode($data[1], true);

                $exists = Trade::query()->where('id',$val['order_no'])->first();
                if(!empty($exists)){
                    continue;
                }


//                Trade::create([
//                    'id' =>  $val['order_no'],
//                    'uid' => array_get($val,'extra_return_param'),
//                    'price' =>  $val['order_amount']
//                ]);
                var_export($val);
                $trade = new Trade();
                $trade->uid = array_get($val,'extra_return_param');
                if( empty($trade->uid))
                    continue;
                $trade->id = $val['order_no'];
                $trade->price = $val['order_amount'];
                $trade->save();
                $user = User::find($trade->uid);
                $user->real_gold += number_format($val['order_amount'],2);
                $user->save();
                if (empty($user)) {
                    continue;
                }

                var_dump(number_format($val['order_amount'] * 0.03, 2));
                //一级
                $oneUser = $user->tallLevelUser;

                if (empty($oneUser)) {
                    continue;
                }
                $oneUser->welfare += number_format($val['order_amount'] * 0.04, 2) < 0.01 ? 0.01 : number_format($val['order_amount'] * 0.04, 2);
                //二级
                $twoUser = $oneUser->tallLevelUser;
                if (empty($twoUser)) {
                    continue;
                }
                $twoUser->welfare += number_format($val['order_amount'] * 0.02, 2) < 0.01 ? 0.01 : number_format($val['order_amount'] * 0.02, 2);
                var_dump($twoUser->save());

                //三级
                $threeUser = $twoUser->tallLevelUser;
                if (empty($threeUser)) {
                    continue;
                }
                $threeUser->welfare += number_format($val['order_amount'] * 0.01, 2) < 0.01 ? 0.01 : number_format($val['order_amount'] * 0.02, 2);
                var_dump($threeUser->save());


            }

        }
    }
}
