<?php

namespace App\Console\Commands;

use App\User;
use App\DripEmailer;

Artisan::command('email:send{user}',function (DripEmailer $drip,$user){
    $drip->send(User::find($user));
});

use Illuminate\Console\Command;use Illuminate\Support\Facades\Artisan;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'command:name';
    protected $signature = 'email:send{user}';

    /**
     * The console command description.
     *
     * @var string
     */
//    protected $description = 'Command description';
    protected $description = 'Send drip e-mails to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $drip;

    /**
     * 创建一个新的命令实例
     *
     * SendEmails constructor.
     */

    public function __construct(DripEmailer $drip)
    {
        parent::__construct();

        $this->drip = $drip;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->drip->send(User::find($this->argument('user')));
    }


}
