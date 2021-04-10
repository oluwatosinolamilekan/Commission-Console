<?php

namespace App\Services\Commission;

use App\Helper\Percentage;
use App\Services\BaseService;
use App\Services\Commission\GetCsvData;

class CommissionService implements BaseService
{
    protected $depositCharge;
    protected $personWithdrawCharge;
    protected $bussinessWithdrawCharge;

    public function __construct($depositCharge,$personWithdrawCharge,$bussinessWithdrawCharge)
    {
        $this->depositCharge =  $depositCharge;
        $this->personWithdrawCharge = $personWithdrawCharge;
        $this->bussinessWithdrawCharge = $bussinessWithdrawCharge;
    }

    public function run()
    {
        $datas = (new GetCsvData())->run();
        $updatedArray = [];
          foreach ($datas as $key => $item) {
                 if($item[3] == 'withdraw' && $item[2] == 'person'){
                    $percent = $this->personWithdrawCharge;
                }elseif($item[3] == 'withdraw' && $item[2] == 'business'){
                    $percent =  $this->bussinessWithdrawCharge;
                }else{
                    $percent = $this->depositCharge;
                }
                $updatedArray[] = [
                    $item[0] => $item[0],
                    $item[1] => $item[1],
                    $item[2] => $item[2],
                    $item[3] => $item[3],
                    $item[4] => Percentage::run($item[4],$percent)
                ];
          }
        return $updatedArray;
    }
}
