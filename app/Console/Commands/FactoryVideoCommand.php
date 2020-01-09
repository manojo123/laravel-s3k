<?php

namespace App\Console\Commands;

use App\Video;
use Illuminate\Console\Command;

class FactoryVideoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factory:video {qty=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Random Video';

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
        factory(Video::class, (int)$this->argument('qty'))->create();
    }
}
