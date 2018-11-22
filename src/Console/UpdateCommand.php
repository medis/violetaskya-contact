<?php

namespace VioletaskyaContact\Console;

use Illuminate\Console\Command as BaseCommand;

class UpdateCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'violetaskya-contact:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish violetaskya.com config';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing violetaskya.com config...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'violetaskya-contact-config',
            '--force' => true
        ]);

        $this->info('violetaskya.com config published successfully.');
    }
}