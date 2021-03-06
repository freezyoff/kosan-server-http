<?php

namespace App\Console\Commands\Kosan;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Str;

class KosanServer_Restart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kosan:kosan-server-restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restart Kosan Server';

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$cmd = "su -c 'systemctl restart KosanServer' < ?";
		$cmd = Str::replaceArray('?', [config("kosan.sudoer_password_file")], $cmd );
		$process = new Process( $cmd );
		$process->run();
		if (!$process->isSuccessful()) {
		    throw new ProcessFailedException($process);
		}
    }
	
}
