<?php

namespace App\Services;

use App\Repositories\ItemRepository;
use Exception;

class ShippingService
{
	/**
	 * URL de cálculo de Preço e Prazo da cotação de Frete
	 */
	private static $urlSoap = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';

	/**
	 * Cria uma collection para armazenar os parametros
	 */
	public static $params = [];

	/**
	 * Seta os parametros da empresa
	 *
	 * nCdServico:
	 * 04014 - SEDEX a vista
	 * 04510 - PAC a vista
	 * 04782 - SEDEX 12 a vista
	 * 04790 - SEDEX 10 a vista
	 * 04804 - SEDEX HOJE a vista
	 */
	public static function defaultParams()
	{
		self::$params = [
			'nCdEmpresa'          => '',
			'sDsSenha'            => '',
			'sCepOrigem'          => '30570000',
			'nCdServico'          => '04510',
			'sCdAvisoRecebimento' => 'N',
		];
	}

	/**
	 * Seta os parametros do item selecionado
	 *
	 * @param  integer|array $item
	 * @param  integer|array $quantity
	 * @return void
	 */
	public static function itemParams($item, $quantity)
	{
		// verifica se vai buscar mais de um item
		if (is_array($item)) {
			$data = self::getByIds($item, $quantity);
		} else {
			$data = self::getById($item, $quantity);
		}

		// A largura não pode ser maior que 105 cm.
		// A largura não pode ser inferior a 11 cm.
		$data['width']  = ($data['width'] < 11)   ? 11 : $data['width'];
		$data['width']  = ($data['width'] <= 105) ? $data['width'] : 0;  // erro
		// A altura não pode ser maior que 105 cm.
		// A altura não pode ser inferior a 2 cm.
		$data['height'] = ($data['height'] < 2)    ? 2 : $data['height'];
		$data['height'] = ($data['height'] <= 105) ? $data['height'] : 0;  // erro
		// O comprimento não pode ser maior que 105 cm.
		// O comprimento não pode ser inferior a 16 cm.
		$data['length'] = ($data['length'] < 16)   ? 16 : $data['length'];
		$data['length'] = ($data['length'] <= 105) ? $data['length'] : 0;  // erro

		$params = [
			'nCdFormato'        => '1', // formato da embalagem (1 = caixa/pacote, 2 = rolo/prisma, 3 = envelope)
			'nVlDiametro'       => '0',
			'nVlPeso'           => $data['weight'],
			'nVlLargura'        => $data['width'],
			'nVlAltura'         => $data['height'],
			'nVlComprimento'    => $data['length'],
			'nVlValorDeclarado' => $data['price'],
		];

		self::$params = array_merge(self::$params, $params);
	}

	/**
	 * Recupera os parametros do item selecionado
	 *
	 * @param  integer $item
	 * @param  integer $quantity
	 * @return array
	 */
	public static function getById($item, $quantity)
	{
		$item = (new ItemRepository())->findById($item);

		return [
			'width'  => $item->productSize->shi_width,
			'height' => $item->productSize->shi_height,
			'length' => $item->productSize->shi_length,
			'weight' => ($item->productSize->weight * $quantity),
			'price'  => ($item->s_price * $quantity),
		];
	}

	/**
	 * Recupera os parametros dos itens selecionados
	 *
	 * @param  array $item
	 * @param  array $quantity
	 * @return array
	 */
	public static function getByIds($item, $quantity)
	{
		$items = (new ItemRepository())->findByIds($item);

		$totalCubic  = 0;
		$totalWeight = 0;
		$totalPrice  = 0;
		$rootCubic   = 0;

		foreach ($items as $key => $item) {
			$totalCubic  += ($item->productSize->shi_width * $item->productSize->shi_height * $item->productSize->shi_length * $quantity[$key]);
			$totalWeight += ($item->productSize->weight * $quantity[$key]);
			$totalPrice  += ($item->s_price * $quantity[$key]);
		}

		// calcula a raiz cubica em centimetros do volume cubico de todos os itens juntos
		$rootCubic = round(pow($totalCubic, 1 / 3), 2);

		return [
			'width'  => $rootCubic,
			'height' => $rootCubic,
			'length' => $rootCubic,
			'weight' => $totalWeight,
			'price'  => $totalPrice,
		];
	}

	/**
	 * Seta os parametros do cliente
	 *
	 * @param string $zipcode
	 * @return void
	 */
	public static function customerParams($zipcode)
	{
		$params = [
			'sCepDestino'   => $zipcode,
			'sCdMaoPropria' => 'N', //  entregar "Em maos" (mais caro)
		];

		self::$params = array_merge(self::$params, $params);
	}

	/**
	 * Metodo responsavel por criar todos os parametros necessarios
	 *
	 * @param  integer|array $item
	 * @param  integer|array $quantity
	 * @param  string        $zipcode
	 * @return void
	 */
	public static function setParams($item, $quantity, $zipcode)
	{
		self::defaultParams();

		self::itemParams($item, $quantity);

		self::customerParams($zipcode);
	}

	/**
	 * Metodo para fazer o orcamento do frete
	 *
	 * @param  array $params
	 * @return json
	 */
	public static function handle($params = [], $method = 'xml')
	{
		// seta os parametros
		self::setParams($params['item'], $params['quantity'], $params['zipcode']);

		try {
			switch ($method) {
				case 'xml' :
					$service = self::handleXML();
					break;
				case 'soap' :
					$service = self::handleSoap();
					break;
				default :
					throw new Exception('Erro: Método não selecionado.', 1);
			}

			if ($service->Erro != '0') {
				throw new Exception('Erro: ' . $service->MsgErro . ' - Cod.: ' . $service->Erro, 1);
			}

			return json_encode($service);

		} catch (Exception $exception) {
			return json_encode(['error' => $exception->getMessage()]);
		}
	}

	/**
	 * Metodo para fazer o orcamento do frete
	 *
	 * @return callback
	 */
	public static function handleXML()
	{
		$url = self::$urlSoap;
		// concatena os parametros na url
		foreach (self::$params as $key => $param) {
			$url .= $key . '=' . $param . '&';
		}
		// carrega a url
		$xml = simplexml_load_file($url . 'StrRetorno=XML');

		return $xml->cServico;
	}

	/**
	 * Metodo para fazer o orcamento do frete
	 *
	 * @return callback
	 */
	public static function handleSoap()
	{
		// instancia a classe
		$soap = new \SoapClient(self::$urlSoap . 'WSDL');
		// calcula o frete
		$return = $soap->CalcPrecoPrazo(self::$params);
		// CALLBACK
		$result = (object) $return->CalcPrecoPrazoResult->Servicos->cServico;

		return $result;
	}
}
