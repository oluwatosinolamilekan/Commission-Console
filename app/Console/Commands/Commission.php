<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Commission\CommissionService;

class Commission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commission:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This console application solves the commision algorithm problem on segery';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
     /**
     * Question
     */
     /*
     calculate the total commission based on the data from the input file and specific rules (defined later) and return the result to the console. The results would be something like: "the commission fees have totaled $1245.23" (without quotes)
     The structure of the CSV file is the following:

    2020-08-01,4,person,withdraw,1000.00
    2020-09-05,4,person,withdraw,1000.00
    2020-12-05,1,person,deposit,200.00
    2021-02-06,2,business,withdraw,300.00

    Where the first column is a date in the "Y-m-d" format;
    The second column is the user ID and can be ignored in this case;
    The third column is a client type, either a "person" or a "business" (the commission fee is different depending on the client type);
    The fourth column is the action type, either "deposit" or "withdraw";
    The fifth column is the amount of money;

    The commission calculation is done using the following rules:

    - a 0.05% fee is being charged for all deposits;
    - when a "person" does a withdraw, they are charged a 0.2% fee;
    - when a "business" does a withdraw, they are charged a 0.5% fee;
     */
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $depositCharge = 0.05;
        $personWithdrawCharge = 0.02;
        $bussinessWithdrawCharge = 0.05;
        $commission = (new CommissionService($depositCharge, $personWithdrawCharge, $bussinessWithdrawCharge))->run();
        $headers = ['Year','User Id','Client Type','Action Type','Amount'];
        $this->table($headers,$commission);
    }
}
