<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FirevelGenerateApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firevel:generate:app {--force}';

    /**
     * App file name.
     *
     * @var string
     */
    protected $filename = 'app.yaml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate app.yaml file using env variables.';

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
     */
    public function handle(): void
    {
        if (! $this->option('force') && file_exists($this->filename)) {
            $this->error($this->filename.' already exists.');

            return;
        }

        $app = file_get_contents($this->filename.'.example');
        foreach ($_ENV as $key => $value) {
            $app = str_replace("\${_{$key}}", $value, $app); // Cloud build use _VAR_NAME format for env variables.
            $app = str_replace("\${{$key}}", $value, $app);
        }

        file_put_contents($this->filename, $app);

        $this->info("app.yaml file generated. Run 'gcloud app deploy' to deploy your app.");
    }
}
