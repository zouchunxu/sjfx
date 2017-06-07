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
//        $redis = (new RedisHelp())->getRedis();


        while (true) {
//            $data = $redis->brPop('trade', 30);
//            if (array_get($data,1)) {
//                $val = json_decode($data[1], true);
            $val = array (
                'trade_no' => 'C1009621741',
                'extra_return_param' => '5',
                'sign_type' => 'RSA-S',
                'notify_type' => 'offline_notify',
                'merchant_code' => '2020000568',
                'order_no' => '20170607231520623',
                'trade_status' => 'SUCCESS',
                'sign' => 'k/RTkKH0bkBLUqYmGvsxl5FbGp4GiQc1usiLAi2A7Wpjsvle+y50AMvclqKm4iTV7XOTQxY3wr4tkBUWFtMw7/gEcxeRga3F8rCXdK+elZQLOV1RR4Tws6W/Zj+UkWyak2qdjZ/3vPabT8HscxzLwY475OVNo72LFobeZHN+Q2g=',
                'order_amount' => '0.01',
                'interface_version' => 'V3.0',
                'bank_seq_no' => '8021800843211170607095029330',
                'order_time' => '2017-06-07 23:15:20',
                'notify_id' => '300e911a37cb4244bdb6fac5c27423cb',
                'trade_time' => '2017-06-07 23:15:05',
            );
                var_export($val);
                $trade = new Trade();
                $trade->uid = $val['extra_return_param'];
                $trade->id = $val['order_no'];
                $trade->price = $val['order_amount'];
                $trade->save();
                $user = User::query()->find($trade->uid);

                var_dump( number_format($val['order_amount']*0.03,2));
                //一级
                $oneUser = $user->tallLevelUser;


                die;
                if (empty($oneUser)) {
                    continue;
                }
                $oneUser->welfare += number_format($val['order_amount']*0.03,2)+10086;
                var_dump($oneUser->save());

                //二级
                $twoUser = $oneUser->tallLevelUser;
                if (empty($twoUser)) {
                    continue;
                }
                $twoUser->welfare += number_format($val['order_amount']*0.03,2);
                var_dump($twoUser->save());
                //三级
                $threeUser = $twoUser->tallLevelUser;
                if (empty($threeUser)) {
                    continue;
                }
                $threeUser->welfare += number_format($val['order_amount']*0.03,2);
                var_dump($threeUser->save());


//            }

        }
    }
}
