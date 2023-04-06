<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class md extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:md';

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
        // command to create multiple models from a single command line

        $modelsPrompt = $this->ask('Enter the models you want to create (separated by a comma)');
        $models = explode(',', $modelsPrompt);

        foreach ($models as $model) {
            $model = trim($model);
            $this->call('make:model', [
                'name' => $model,
            ]);
        }

        $this->info('Models created successfully');
    }
}
