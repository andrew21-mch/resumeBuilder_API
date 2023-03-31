<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class cc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //command to create multiple controllers from a single command line

        $controllersPrompt = $this->ask('Enter the controllers you want to create (separated by a comma)');
        $controllers = explode(',', $controllersPrompt);

        foreach ($controllers as $controller) {
            $controller = trim($controller);
            $this->call('make:controller', [
                'name' => 'API/'.$controller.'Controller',
            ]);
        }
    }
}
