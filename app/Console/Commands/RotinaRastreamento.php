<?php

namespace App\Console\Commands;

use App\Rastreamento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RotinaRastreamento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rastreamento-urls:checar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        foreach(Rastreamento::cursor() as $rastreamento ) {
            try {
                $response = Http::get($rastreamento->url);
                $rastreamento->body = $response->body();
                $rastreamento->status_code = $response->status();
                $rastreamento->save();

            } catch (\Exception $exception) {
                Log::error($exception->getMessage(), $exception->getTrace());
                continue;
            }
        }

        return 0;
    }
}
