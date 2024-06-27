<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

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
        if (! Storage::exists('backup')) {
            Storage::makeDirectory('backup');
        }
 
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
    
        $command = "mysql --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD')
                . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') 
                . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
 
        $returnVar = NULL;
        $output  = NULL;
 
        exec($command, $output, $returnVar);
    


    // $filename = "backup-" .now()->format('Y-m-d') . ".gz";
    
    //   $command = "C:\xampp\htdocs\laravelR5\storage\app\backup\ " . $filename;
    
    //     $returnVar = NULL;
    //     $output  = NULL;
    
    //     exec($command, $output, $returnVar);


    }

}