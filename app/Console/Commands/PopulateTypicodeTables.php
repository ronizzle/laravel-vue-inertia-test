<?php

namespace App\Console\Commands;

use App\Services\TypicodeService;
use Illuminate\Console\Command;

class PopulateTypicodeTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-typicode-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TypicodeService $typicodeService)
    {
        $typicodeService->depopulateTypicodeTables();;
        $typicodeService->syncUsers();
        $typicodeService->syncPosts();
    }
}
