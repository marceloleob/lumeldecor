<?php

use App\Models\ProductPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_photos')->delete();
    }
}
