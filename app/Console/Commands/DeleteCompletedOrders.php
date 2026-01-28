<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DeleteCompletedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:delete-completed {--delay=30}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete completed orders older than specified delay (in seconds)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $delay = (int) $this->option('delay');
        $cutoffTime = Carbon::now()->subSeconds($delay);

        $deleted = Order::where('status', 'completed')
            ->where('completed_at', '<=', $cutoffTime)
            ->forceDelete();

        $this->info("Deleted {$deleted} completed orders older than {$delay} seconds.");
    }
}
