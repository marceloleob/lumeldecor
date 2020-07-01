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
	 * @param integer $item
	 * @param integer $quantity
	 * @return void
	 */
	public static function itemParams($item, $quantity)
	{
		$item = (new ItemRepository())->findById($item);

		$params = [
			'nCdFormato'        => '1', // formato da embalagem (1 = caixa/pacote, 2 = rolo/prisma, 3 = envelope)
			'nVlDiametro'       => '0',
			'nVlPeso'           => ($item->productSize->weight * $quantity),
			'nVlLargura'        => (int) $item->productSize->shi_width,
			'nVlAltura'         => (int) $item->productSize->shi_height,
			'nVlComprimento'    => (int) $item->productSize->shi_length,
			'nVlValorDeclarado' => ($item->s_price * $quantity),
		];

		self::$params = array_merge(self::$params, $params);
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
	 * @param integer $params
	 * @param string  $params
	 * @param integer $quantity
	 * @return void
	 */
	public static function setParams($item, $zipcode, $quantity)
	{
		self::defaultParams();

		self::itemParams($item, $quantity);

		self::customerParams($zipcode);
	}

	/**
	 * Metodo para fazer o orcamento do frete
	 *
	 * @param array $params
	 */
	public static function handle($params = [], $method = 'xml')
	{
		// seta os parametros
		self::setParams($params['item'], $params['zipcode'], $params['quantity']);

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
				throw new Exception('Erro: ' . $service->MsgErro, 1);
			}

			return json_encode($service);

		} catch (Exception $exception) {

			return $exception->getMessage();
		}

	}

	/**
	 * Metodo para fazer o orcamento do frete
	 *
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
