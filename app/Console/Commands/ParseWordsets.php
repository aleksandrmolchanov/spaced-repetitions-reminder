<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ParseWordsets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-wordsets {user_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $wordsets = [];

        $data = File::json(base_path('resources/json/puzzle-english.json'));
        foreach($data['response']['userSets'][0]['children'] as $wordset)
        {
            $wordsets[] = [
                'id_puzzle_english' => $wordset['id'],
                'user_id' => $this->argument('user_id') ?? null,
                'title' => $wordset['title_ru']
            ];
        }

        DB::table('wordsets')->upsert(
            $wordsets,
            ['id_puzzle_english']
        );

        $this->info('Resource successfully processed!');
    }
}
