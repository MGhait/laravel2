<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

// ### YOU CAN CREATE COMMANDS ALSO FORM routes/consle.php FILE BUT HERE IS THE BEST
class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:create {productName} {--fixedPrice}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Will Create A New Product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('productName');
        $fixedPrice = $this->option('fixedPrice');
        // dd($name);
        $product = Product::updateOrCreate(['name' => $name],[
            'price' => $fixedPrice ? 300 : rand(400, 1000),
        ]);
        if($product) $this->info('The Product Has Been Created Successfully');
        // if($product) $this->error('Something went worng');
        // look at progress bar in the documentaion
        
    }
}
