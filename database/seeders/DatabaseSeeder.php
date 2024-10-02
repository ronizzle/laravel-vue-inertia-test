<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\TypicodeService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly TypicodeService $typicodeService
    )
    {

    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->typicodeService->depopulateTypicodeTables();;
        $this->typicodeService->syncUsers();
        $this->typicodeService->syncPosts();
    }
}
