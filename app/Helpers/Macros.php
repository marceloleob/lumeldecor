<?php

namespace App\Helpers;

use Collective\Html\FormBuilder;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Session;

class Macros extends FormBuilder
{
	/**
	 * Macro para renderizar mensagens de retorno
	 *
	 * @param Collection $errors
	 *
	 * @return void
	 */
	public static function boxNotification($errors)
	{
		// verifica o tipo do erro
		if ($errors->any()) {
			return self::requestErrors($errors);
		}

		return self::flashMessage();
	}

	/**
	 * Renderiza os erros retornados do request validate
	 *
	 * @param Collection $errors
	 *
	 * @return HtmlString
	 */
	public static function requestErrors($errors)
	{
		// seta os alertas
		$alerts = [];

		array_push($alerts, '<div class="feedback alert alert-danger">'); // fade in
		array_push($alerts, '    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
		array_push($alerts, '    <i class="fas fa-times-circle"></i> &nbsp; Erros encontrados: ');
		array_push($alerts, '    <ul>');
		foreach ($errors->all() as $error) {
			array_push($alerts, '        <li>' . $error . '</li>');
		}
		array_push($alerts, '    </ul>');
		array_push($alerts, '</div>');
		// retorna
		return implode('', $alerts);
	}

	/**
	 * Renderiza os erros gravados em sessao
	 *
	 * @return HtmlString
	 */
	public static function flashMessage()
	{
		// seta os alertas
		$alerts = [];
		// seta os tipos
		$types = [
			'success' => 'fa-check',
			'danger'  => 'fa-times-circle',
			'warning' => 'fa-exclamation-triangle',
			'info'    => 'fa-info-circle'
		];

		foreach ($types as $type => $ico) {
			// verifica  se existe algum tipo na sessao
			if (Session::has($type)) {
				// recupera o tipo
				array_push($alerts, '<div class="feedback alert alert-' . $type . '">');
				array_push($alerts, '    <i class="fas ' . $ico . '"></i> &nbsp; ' . Session::get($type));
				array_push($alerts, '    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
				array_push($alerts, '</div>');
			}
		}
		// retorna
		return implode('', $alerts);
	}

	/**
	 * Mostra os erros dos campos do formulario
	 *
	 * @param string $name
	 * @param Collection $errors
	 *
	 * @return HtmlString
	 */
	public static function notification($name, $errors)
	{
		$html  = '<span for="' . $name . '" generated="true" class="help-block">';
		$html .= '    <i class="fa fa-times fa-fw"></i> :message';
		$html .= '</span>';

		return $errors->first($name, $html);
	}

	/**
	 * Cria os botoes para Salvar ou Cancelar um formulario
	 *
	 * @param string $link
	 * @param int    $id
	 * @param array  $options
	 *
	 * @return HtmlString
	 */
	public function buttons($link, $id = null, $options = [])
	{
		$buttons = [];

		$route = isset($options['cancel-link-params']) ? route($link, $options['cancel-link-params']) : route($link);

		$buttonCancelTitle = $options['cancel-title'] ?? 'Cancelar';
		$buttonCancelIcon  = 'fas fa-times-circle';
		$buttonCancelShow  = $options['cancel-show'] ?? true;
		$buttonBack        = $options['back-show'] ?? false;


		if (!empty($id) || $buttonBack === true) {
			$buttonCancelTitle = $options['cancel-title'] ?? 'Voltar';
			$buttonCancelIcon  = 'fas fa-arrow-circle-left';
		}

		if ($buttonCancelShow === true) {
			array_push($buttons, '<a href="' . $route . '" class="mb-2 mr-4 btn-icon btn-shadow btn btn-outline-focus float-left">');
			array_push($buttons, '<i class="' . $buttonCancelIcon . ' fa-w-10 pr-2"></i> ' . $buttonCancelTitle);
			array_push($buttons, '</a>');
		}

		// monta o botao save
		$buttonSave = $this->button(
			'<i class="fas fa-cloud-upload-alt fa-w-10 pr-2"></i> Salvar',
			[
				'type' => 'submit',
				'class' => 'mb-2 mr-4 px-5 btn-icon btn-hover-shine btn btn-shadow btn-success btn-save btn-wide btn-pill'
				// 'class' => 'mb-2 mr-4 px-4 btn-icon btn-hover-shine btn btn-shadow btn-outline-success'
			]
		);

		// verifica se é um UPDATE
		if (!empty($id)) {
			array_push($buttons, $this->hidden('_method', 'PUT'));
			array_push($buttons, $this->hidden('id', $id, ['id' => 'id']));
		}

		array_push($buttons, $buttonSave);

		return implode('', $buttons);
	}

	/**
	 * Create a select day field.
	 *
	 * @param  string $name
	 * @param  string $selected
	 * @param  array  $options
	 * @param  string $format
	 *
	 * @return HtmlString
	 */
	public function selectDay($name, $selected = null, $options = [], $format = '%d')
	{
		$days = [];

		foreach (range(1, 31) as $day) {
			$days[$day] = strftime($format, mktime(0, 0, 0, 0, $day));
		}

		return $this->select($name, $days, $selected, $options);
	}

	/**
	 * Create a select month field.
	 *
	 * @param  string $name
	 * @param  string $selected
	 * @param  array  $options
	 * @param  string $format
	 *
	 * @return HtmlString
	 */
	public function selectMonth($name, $selected = null, $options = [], $format = '%m')
	{
		$months = [];

		foreach (range(1, 12) as $month) {
			$months[$month] = trans('date.month.' . strftime($format, mktime(0, 0, 0, $month, 1)));
		}

		return $this->select($name, $months, $selected, $options);
	}

	/**
	 * Create a select size field.
	 *
	 * @param  string $name
	 * @param  string $selected
	 * @param  array  $options
	 *
	 * @return HtmlString
	 */
	public function selectKind($name, $selected = null, $options = [])
	{
		$size = [
			'V' => 'Dinheiro (R$)',
			'P' => 'Porcentagem (%)',
		];

		return $this->select($name, $size, $selected, $options);
	}

	/**
	 * Create a select size field.
	 *
	 * @param  string $name
	 * @param  string $selected
	 * @param  array  $options
	 *
	 * @return HtmlString
	 */
	public function selectSize($name, $selected = null, $options = [])
	{
		$size = [
			'PP' => 'PP',
			'P'  => 'P',
			'M'  => 'M',
			'G'  => 'G',
			'GG' => 'GG',
			'U'  => 'Único'
		];

		return $this->select($name, $size, $selected, $options);
	}

	/**
	 * Create a select sort field.
	 *
	 * @param  string $name
	 * @param  string $selected
	 * @param  array  $options
	 *
	 * @return HtmlString
	 */
	public function selectSort($name, $selected = null, $options = [])
	{
		$size = [
			'best-seller' => 'Mais Vendidos',
			'low-high'    => 'Menores Preços',
			'high-low'    => 'Maiores Preços',
			'lauch'       => 'Lançamentos',
		];

		return $this->select($name, $size, $selected, $options);
	}

	/**
	 * Create a select sort field.
	 *
	 * @param  string $name
	 * @param  string $selected
	 * @param  array  $options
	 *
	 * @return HtmlString
	 */
	public function selectShow($name, $selected = null, $options = [])
	{
		$size = [
			'9'  => '9',
			'18' => '18',
			'27' => '27',
		];

		return $this->select($name, $size, $selected, $options);
	}

	/**
	 * Create a checkbox with bootstrap switch.
	 *
	 * @param  string $name
	 * @param  string $value
	 * @param  array  $options
	 *
	 * @return HtmlString
	 */
	public function switch($name, $value)
	{
		// $switch = [];
		// array_push($switch, $this->label('status-label', 'Status', ['class' => 'required']));
		// array_push($switch, '<div class="custom-control custom-switch">');
		// array_push($switch, $this->checkbox($name, ($value ? 'yes' : 'no'), ((bool) $value), ['class' => 'custom-control-input checkbox-status', 'id' => 'status']));
		// array_push($switch, '<label class="custom-control-label label-status" for="status">Este registro está </label>');
		// array_push($switch, '</div>');
		// return implode('', $switch);

		$radio = [];

		array_push($radio, $this->label('status-label', 'Status', ['class' => 'required']));
		array_push($radio, '<div>');
		array_push($radio, '  <div class="custom-radio custom-control">');
		array_push($radio,      $this->radio('status', '1', ($value === config('constants.STATUS_ACTIVE')) ? true : false, ['class' => 'custom-control-input', 'id' => 'status-active']));
		array_push($radio,      $this->label('status-active', 'Ativo no site', ['class' => 'custom-control-label']));
		array_push($radio, '  </div>');
		array_push($radio, '  <div class="custom-radio custom-control">');
		array_push($radio,      $this->radio('status', '0', ($value === config('constants.STATUS_INACTIVE')) ? true : false, ['class' => 'custom-control-input', 'id' => 'status-inactive']));
		array_push($radio,      $this->label('status-inactive', 'Inativo no site', ['class' => 'custom-control-label']));
		array_push($radio, '  </div>');
		array_push($radio, '</div>');

		return implode('', $radio);
	}
}
