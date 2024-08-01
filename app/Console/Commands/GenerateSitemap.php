<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
                ->add(Url::create('/project')->setPriority(0.8)->setChangeFrequency('monthly'))
                ->add(Url::create('/template')->setPriority(0.8)->setChangeFrequency('monthly'))
                ->add(Url::create('/cek-invoice')->setPriority(0.8)->setChangeFrequency('monthly'));

        $products = Product::all();

        foreach ($products as $product) {
            $sitemap->add(
                Url::create('/' . $product->slug)
                ->setPriority(0.9)
                ->setChangeFrequency('weekly')
                ->setLastModificationDate($product->updated_at)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
