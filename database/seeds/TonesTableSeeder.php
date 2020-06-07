<?php

use App\Models\Tone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('tones')->delete();
		// cria os registros
		// Tone::create(['color_id' => 1, 'name' => 'Vermelho', 'hexa' => '#DF0101', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Laranja', 'hexa' => '#FF8000', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Mostarda', 'hexa' => '#FFBF00', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Amarelo', 'hexa' => '#FFFF00', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Verde', 'hexa' => '#04B404', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Azul', 'hexa' => '#0101DF', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Roxo', 'hexa' => '#7401DF', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Rosa', 'hexa' => '#FF00FF', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Salmão', 'hexa' => '#FA8072', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Branco', 'hexa' => '#FFFFFF', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Preto', 'hexa' => '#000000', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Prata', 'hexa' => '#E6E6E6', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Dourado', 'hexa' => '#FFD700', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Cinza', 'hexa' => '#848484', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Marrom', 'hexa' => '#8A4B08', 'status' => 1]);
		// Tone::create(['color_id' => 1, 'name' => 'Madeira', 'hexa' => '#EDDDBC', 'status' => 1]);

		Tone::create(['color_id' => 1, 'name' => 'Pink ', 'hexa' => '#FFC0CB', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'LightPink ', 'hexa' => '#FFB6C1', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'HotPink ', 'hexa' => '#FF69B4', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'DeepPink ', 'hexa' => '#FF1493', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'PaleVioletRed ', 'hexa' => '#DB7093', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'MediumVioletRed ', 'hexa' => '#C71585', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Lavender ', 'hexa' => '#E6E6FA', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Thistle ', 'hexa' => '#D8BFD8', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Plum ', 'hexa' => '#DDA0DD', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Orchid ', 'hexa' => '#DA70D6', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Violet ', 'hexa' => '#EE82EE', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Magenta ', 'hexa' => '#FF00FF', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'MediumOrchid ', 'hexa' => '#BA55D3', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'DarkOrchid ', 'hexa' => '#9932CC', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'DarkViolet ', 'hexa' => '#9400D3', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'BlueViolet ', 'hexa' => '#8A2BE2', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'DarkMagenta ', 'hexa' => '#8B008B', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Purple ', 'hexa' => '#800080', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'MediumPurple ', 'hexa' => '#9370DB', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'MediumSlateBlue ', 'hexa' => '#7B68EE', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'SlateBlue ', 'hexa' => '#6A5ACD', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'DarkSlateBlue ', 'hexa' => '#483D8B', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'RebeccaPurple ', 'hexa' => '#663399', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Indigo  ', 'hexa' => '#4B0082', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'LightSalmon ', 'hexa' => '#FFA07A', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Salmon ', 'hexa' => '#FA8072', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'DarkSalmon ', 'hexa' => '#E9967A', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'LightCoral ', 'hexa' => '#F08080', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'IndianRed  ', 'hexa' => '#CD5C5C', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Crimson ', 'hexa' => '#DC143C', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Red ', 'hexa' => '#FF0000', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'FireBrick ', 'hexa' => '#B22222', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'DarkRed ', 'hexa' => '#8B0000', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Orange ', 'hexa' => '#FFA500', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'DarkOrange ', 'hexa' => '#FF8C00', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Coral ', 'hexa' => '#FF7F50', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Tomato ', 'hexa' => '#FF6347', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'OrangeRed ', 'hexa' => '#FF4500', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Gold ', 'hexa' => '#FFD700', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Yellow ', 'hexa' => '#FFFF00', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'LightYellow ', 'hexa' => '#FFFFE0', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'LemonChiffon ', 'hexa' => '#FFFACD', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'LightGoldenRodYellow ', 'hexa' => '#FAFAD2', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'PapayaWhip ', 'hexa' => '#FFEFD5', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Moccasin ', 'hexa' => '#FFE4B5', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'PeachPuff ', 'hexa' => '#FFDAB9', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'PaleGoldenRod ', 'hexa' => '#EEE8AA', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Khaki ', 'hexa' => '#F0E68C', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'DarkKhaki ', 'hexa' => '#BDB76B', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'GreenYellow ', 'hexa' => '#ADFF2F', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Chartreuse ', 'hexa' => '#7FFF00', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'LawnGreen ', 'hexa' => '#7CFC00', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Lime ', 'hexa' => '#00FF00', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'LimeGreen ', 'hexa' => '#32CD32', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'PaleGreen ', 'hexa' => '#98FB98', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'LightGreen ', 'hexa' => '#90EE90', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'MediumSpringGreen ', 'hexa' => '#00FA9A', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'SpringGreen ', 'hexa' => '#00FF7F', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'MediumSeaGreen ', 'hexa' => '#3CB371', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'SeaGreen ', 'hexa' => '#2E8B57', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'ForestGreen ', 'hexa' => '#228B22', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Green ', 'hexa' => '#008000', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'DarkGreen ', 'hexa' => '#006400', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'YellowGreen ', 'hexa' => '#9ACD32', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'OliveDrab ', 'hexa' => '#6B8E23', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'DarkOliveGreen ', 'hexa' => '#556B2F', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'MediumAquaMarine ', 'hexa' => '#66CDAA', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'DarkSeaGreen ', 'hexa' => '#8FBC8F', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'LightSeaGreen ', 'hexa' => '#20B2AA', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'DarkCyan ', 'hexa' => '#008B8B', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Teal ', 'hexa' => '#008080', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Cyan ', 'hexa' => '#00FFFF', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'LightCyan ', 'hexa' => '#E0FFFF', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'PaleTurquoise ', 'hexa' => '#AFEEEE', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Aquamarine ', 'hexa' => '#7FFFD4', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Turquoise ', 'hexa' => '#40E0D0', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'MediumTurquoise ', 'hexa' => '#48D1CC', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'DarkTurquoise ', 'hexa' => '#00CED1', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'CadetBlue ', 'hexa' => '#5F9EA0', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'SteelBlue ', 'hexa' => '#4682B4', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'LightSteelBlue ', 'hexa' => '#B0C4DE', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'LightBlue ', 'hexa' => '#ADD8E6', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'PowderBlue ', 'hexa' => '#B0E0E6', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'LightSkyBlue ', 'hexa' => '#87CEFA', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'SkyBlue ', 'hexa' => '#87CEEB', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'CornflowerBlue ', 'hexa' => '#6495ED', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'DeepSkyBlue ', 'hexa' => '#00BFFF', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'DodgerBlue ', 'hexa' => '#1E90FF', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'RoyalBlue ', 'hexa' => '#4169E1', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'Blue ', 'hexa' => '#0000FF', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'MediumBlue ', 'hexa' => '#0000CD', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'DarkBlue ', 'hexa' => '#00008B', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'Navy ', 'hexa' => '#000080', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'MidnightBlue ', 'hexa' => '#191970', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Cornsilk ', 'hexa' => '#FFF8DC', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'BlanchedAlmond ', 'hexa' => '#FFEBCD', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Bisque ', 'hexa' => '#FFE4C4', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'NavajoWhite ', 'hexa' => '#FFDEAD', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Wheat ', 'hexa' => '#F5DEB3', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'BurlyWood ', 'hexa' => '#DEB887', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Tan ', 'hexa' => '#D2B48C', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'RosyBrown ', 'hexa' => '#BC8F8F', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'SandyBrown ', 'hexa' => '#F4A460', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'GoldenRod ', 'hexa' => '#DAA520', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'DarkGoldenRod ', 'hexa' => '#B8860B', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Peru ', 'hexa' => '#CD853F', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Chocolate ', 'hexa' => '#D2691E', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Olive ', 'hexa' => '#808000', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'SaddleBrown ', 'hexa' => '#8B4513', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Sienna ', 'hexa' => '#A0522D', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Brown ', 'hexa' => '#A52A2A', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Maroon ', 'hexa' => '#800000', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'White ', 'hexa' => '#FFFFFF', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Snow ', 'hexa' => '#FFFAFA', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'HoneyDew ', 'hexa' => '#F0FFF0', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'MintCream ', 'hexa' => '#F5FFFA', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Azure ', 'hexa' => '#F0FFFF', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'AliceBlue ', 'hexa' => '#F0F8FF', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'GhostWhite ', 'hexa' => '#F8F8FF', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'WhiteSmoke ', 'hexa' => '#F5F5F5', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'SeaShell ', 'hexa' => '#FFF5EE', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Beige ', 'hexa' => '#F5F5DC', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'OldLace ', 'hexa' => '#FDF5E6', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'FloralWhite ', 'hexa' => '#FFFAF0', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Ivory ', 'hexa' => '#FFFFF0', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'AntiqueWhite ', 'hexa' => '#FAEBD7', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Linen ', 'hexa' => '#FAF0E6', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'LavenderBlush ', 'hexa' => '#FFF0F5', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'MistyRose ', 'hexa' => '#FFE4E1', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Gainsboro ', 'hexa' => '#DCDCDC', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'LightGray ', 'hexa' => '#D3D3D3', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Silver ', 'hexa' => '#C0C0C0', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'DarkGray ', 'hexa' => '#A9A9A9', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'DimGray ', 'hexa' => '#696969', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Gray ', 'hexa' => '#808080', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'LightSlateGray ', 'hexa' => '#778899', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'SlateGray ', 'hexa' => '#708090', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'DarkSlateGray ', 'hexa' => '#2F4F4F', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Black ', 'hexa' => '#000000', 'status' => 1]);




    }
}
