<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanOldLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete logs older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $date = now()->subDays(30);
        DB::table('logs')->where('created_at', '<', $date)->delete();
        $this->info('Old logs cleaned successfully.');
    }
}
