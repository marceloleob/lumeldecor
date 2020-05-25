<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Product;
use Exception;

class ProductService
{
// 	array:17 [▼
// 	"_token" => "xOyj6AcPLKR1snnCQ7kiVA4UgJvvmJ1vwIXC98Bm"
// 	"material_id" => "2"
// 	"category_id" => "6"
// 	"name" => "Liso Lindo"
// 	"featured" => true
// 	"description" => "Nulla porttitor accumsan tincidunt. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a ▶"
// 	"hashtag" => null
// 	"size" => "P"
// 	"weight" => "0.00"
// 	"supplier_id" => "1"
// 	"s_price" => 45.66
// 	"p_price" => 12.44
// 	"length" => "98.00"
// 	"width" => "54.00"
// 	"height" => "23.00"
// 	"item" => array:1 [▼
// 	  0 => array:5 [▼
// 		"color" => "6"
// 		"amount" => "99"
// 		"theme" => "11"
// 		"launch" => true
// 		"photo" => Illuminate\Http\UploadedFile {#1236 ▶}
// 	  ]
// 	]
// 	"count-color" => "0"
//   ]

	/**
	 * Gerencia o metodo save e update dos produtos
	 *
	 * @param array $data
	 * @return void
	 */
    public static function store($data = [])
    {
		// 1º) Salva o ProductInfo
        // 'material_id'   => 'required|integer',
        // 'category_id'   => 'required|integer',
        // 'name'          => 'required|min:2|max:100',
        // 'description'   => 'max:3000',
        // 'hashtag'       => 'max:3000|nullable',
        // 'featured'      => 'boolean',
		// 'status'        => 'boolean',

		// 2º) Salva o Product
		// product_info_id
		// 'id'            => 'integer',
        // 'size'          => 'required|string|required_with:P,M,G,U',
        // 'weight'        => "required|regex:/^\d+(\.\d{1,3})?$/",
        // 'height'        => "required|regex:/^\d+(\.\d{1,2})?$/",
        // 'width'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        // 'length'        => "required|regex:/^\d+(\.\d{1,2})?$/",
		// 's_price'       => 'required|regex:/^\d+(\.\d{1,2})?$/',

		// 3º) Salva o ProductSupplier
		// product_id
        // 'supplier_id'   => 'required|integer',
        // 'p_price'       => "required|regex:/^\d+(\.\d{1,2})?$/",

		// 4º) Salva os Items (array)
		// product_id
        // 'item.*.color'  => 'required|integer',
        // 'item.*.photo'  => 'required|image|mimes:jpeg,png,jpg|max:3000', // 3 MEGABYTES
		// 'item.*.launch' => 'boolean',

		// 5º) Salva o(s) ThemeItem (array)
		// item_id
		// 'item.*.theme'  => 'integer',

		// 6º) Salva o Stock de cada item (array)
		// product_id
		// item_id
		// user_id
		// action (Incoming)
		// incoming ('item.*.amount')
		// overdraw (empty)
		// balance (o que tinha + incoming)

	}
}
