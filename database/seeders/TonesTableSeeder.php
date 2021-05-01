<?php

namespace Database\Seeders;

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

		// ROSA
		Tone::create(['color_id' => 1, 'name' => 'Rosa Claro', 'hexa' => '#FFC0CB', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Magenta Clara', 'hexa' => '#EE82EE', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Magenta', 'hexa' => '#FF33CC', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Magenta Escura', 'hexa' => '#8B008B', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Rosa', 'hexa' => '#FF69B4', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Rosa Choque', 'hexa' => '#FF1493', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Rosa Violeta', 'hexa' => '#C71585', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Rosa Pardo', 'hexa' => '#DA70D6', 'status' => 1]);
		Tone::create(['color_id' => 1, 'name' => 'Rosé', 'hexa' => '#FFE4E1', 'status' => 1]);

		// ROXO
		Tone::create(['color_id' => 2, 'name' => 'Lilás', 'hexa' => '#9400D3', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Orquídea', 'hexa' => '#BA55D3', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Orquídea Escura', 'hexa' => '#9932CC', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Violeta ', 'hexa' => '#8A2BE2', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Violeta Escuro', 'hexa' => '#800080', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Roxo Claro', 'hexa' => '#9370DB', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Roxo', 'hexa' => '#663399', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Roxo Escuro', 'hexa' => '#4B0082', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Violeta Azulado', 'hexa' => '#7B68EE', 'status' => 1]);
		Tone::create(['color_id' => 2, 'name' => 'Violeta Azulado Escuro', 'hexa' => '#483D8B', 'status' => 1]);

		// VERMELHO
		Tone::create(['color_id' => 3, 'name' => 'Salmão', 'hexa' => '#FA8072', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Salmão Escuro ', 'hexa' => '#CD5C5C', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Vermelho', 'hexa' => '#FE0101', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Vermelho Claro', 'hexa' => '#FE6767', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Vermelho Escuro', 'hexa' => '#980101', 'status' => 1]);
		Tone::create(['color_id' => 3, 'name' => 'Vermelho Rosa', 'hexa' => '#DC143C', 'status' => 1]);

		// LARANJA
		Tone::create(['color_id' => 4, 'name' => 'Laranja', 'hexa' => '#FF8000', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Laranja Amarelado', 'hexa' => '#FFA500', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Acerola Claro', 'hexa' => '#FF7F50', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Acerola', 'hexa' => '#FF6347', 'status' => 1]);
		Tone::create(['color_id' => 4, 'name' => 'Laranja Avermelhado', 'hexa' => '#FF4500', 'status' => 1]);

		// AMARELO
		Tone::create(['color_id' => 5, 'name' => 'Amarelo', 'hexa' => '#FFFF33', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Amarelo Claro', 'hexa' => '#FFFF80', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Amarelo Escuro', 'hexa' => '#999900', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Mostarda', 'hexa' => '#FFBF00', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Mostarda Escuro', 'hexa' => '#997300', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Pêssego', 'hexa' => '#FFDAB9', 'status' => 1]);
		Tone::create(['color_id' => 5, 'name' => 'Amarelo Esverdeado', 'hexa' => '#808000', 'status' => 1]);

		// VERDE
		Tone::create(['color_id' => 6, 'name' => 'Limão', 'hexa' => '#32CD32', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Menta', 'hexa' => '#98FB98', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Mar', 'hexa' => '#3CB371', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Mar Escuro', 'hexa' => '#2E8B57', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde', 'hexa' => '#008000', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Escuro', 'hexa' => '#006400', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Oliva Claro', 'hexa' => '#9ACD32', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Oliva', 'hexa' => '#6B8E23', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Oliva Escuro', 'hexa' => '#556B2F', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Água Claro', 'hexa' => '#7FFFD4', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Água Escuro', 'hexa' => '#66CDAA', 'status' => 1]);
		Tone::create(['color_id' => 6, 'name' => 'Verde Água', 'hexa' => '#00CED1', 'status' => 1]);

		// AZUL
		Tone::create(['color_id' => 7, 'name' => 'Lavanda', 'hexa' => '#E6E6FA', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul Céu', 'hexa' => '#87CEFA', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul Turqueza', 'hexa' => '#00BFFF', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul Claro', 'hexa' => '#1E90FF', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul Royal', 'hexa' => '#4169E1', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul', 'hexa' => '#0000CD', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul Escuro', 'hexa' => '#000080', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Meia Noite', 'hexa' => '#191970', 'status' => 1]);
		Tone::create(['color_id' => 7, 'name' => 'Azul Metálico', 'hexa' => '#4682B4', 'status' => 1]);

		// MARROM
		Tone::create(['color_id' => 8, 'name' => 'Marrom', 'hexa' => '#8B4513', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'Marrom Claro', 'hexa' => '#A0522D', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'Madeira Cara', 'hexa' => '#EDDDBC', 'status' => 1]);
		Tone::create(['color_id' => 8, 'name' => 'Madeira', 'hexa' => '#DEB887', 'status' => 1]);

		// CORES PASTEIS
		Tone::create(['color_id' => 9, 'name' => 'Neve', 'hexa' => '#FFFAFA', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Verde', 'hexa' => '#F0FFF0', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Minta', 'hexa' => '#F5FFFA', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Verde Água', 'hexa' => '#F0FFFF', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Azul', 'hexa' => '#F0F8FF', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Lilás', 'hexa' => '#F8F8FF', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Cinza', 'hexa' => '#F5F5F5', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Oliva', 'hexa' => '#F5F5DC', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Amarelo', 'hexa' => '#FFFFF0', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Laranja', 'hexa' => '#FAEBD7', 'status' => 1]);
		Tone::create(['color_id' => 9, 'name' => 'Rosa', 'hexa' => '#FFF0F5', 'status' => 1]);

		// TONS DE CINZA
		Tone::create(['color_id' => 10, 'name' => 'Branco', 'hexa' => '#FFFFFF', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Cinza Claro', 'hexa' => '#CCCCCC', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Cinza', 'hexa' => '#808080', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Grafite', 'hexa' => '#404040', 'status' => 1]);
		Tone::create(['color_id' => 10, 'name' => 'Preto', 'hexa' => '#000000', 'status' => 1]);

		// NEON
		Tone::create(['color_id' => 11, 'name' => 'Vermelho', 'hexa' => '#FF0000', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Amarelo', 'hexa' => '#FFFF00', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Verde', 'hexa' => '#00FF00', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Azul Claro', 'hexa' => '#00FFFF', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Azul', 'hexa' => '#0000FF', 'status' => 1]);
		Tone::create(['color_id' => 11, 'name' => 'Rosa', 'hexa' => '#FF00FF', 'status' => 1]);

		// METALICOS
		Tone::create(['color_id' => 12, 'name' => 'Prata', 'hexa' => '#E6E6E6', 'status' => 1]);
		Tone::create(['color_id' => 12, 'name' => 'Dourado', 'hexa' => '#FFD700', 'status' => 1]);
		Tone::create(['color_id' => 12, 'name' => 'Bronze', 'hexa' => '#B33C00', 'status' => 1]);
    }
}
