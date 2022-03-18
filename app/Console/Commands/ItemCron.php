<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Services\CronService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ItemCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expired items and update the needed columns';

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
     * @return int
     */
    public function handle(CronService $cronService)
    {
        Log::info("Item Cron is working fine!");

        $cronService->updateExpiredItems();
    }
}
