<?php

namespace NormanHuth\NovaMenu\Console\Commands;

use Illuminate\Support\Facades\File;

class TailwindColorsCommand extends FontAwesomeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-menu:tailwind-colors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Tailwind CSS colors';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (!is_dir(public_path('css'))) {
            File::makeDirectory(public_path('css'));
        }
        File::copy(realpath(__DIR__.'/../../../assets/tailwind/css/tailwind-colors.css'), public_path('css/tailwind-colors.css'));

        $file = resource_path('views/vendor/nova/partials/meta.blade.php');
        $meta = file_exists($file) ? file_get_contents($file)."\n" : '';
        /** @noinspection HtmlUnknownTarget */
        if (
            !str_contains($meta, '<link rel="stylesheet" href="/css/tailwind-colors.css">') &&
            !str_contains($meta, '<link rel="stylesheet" href="{{ asset(\'css/tailwind-colors.css\') }}">')
        ) {
            $this->createTarget();
            /** @noinspection HtmlUnknownTarget */
            $meta.= '<link rel="stylesheet" href="{{ asset(\'css/tailwind-colors.css\') }}">';
            file_put_contents($file, $meta);
        }
    }
}
