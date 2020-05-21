<?php

namespace App\Helpers;

use Collective\Html\FormBuilder;
use Collective\Html\HtmlBuilder;
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
     * @return \Illuminate\Support\HtmlString
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
     * @return \Illuminate\Support\HtmlString
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
     * @return \Illuminate\Support\HtmlString
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
	 *
     * @return \Illuminate\Support\HtmlString
     */
    public function buttons($link, $id = null)
    {
        $buttons = [];

        $save = $this->button(
            '<i class="fas fa-cloud-upload-alt fa-w-10 pr-2"></i> Salvar',
            [
                'type' => 'submit',
                'class' => 'btn-hover-shine btn btn-shadow btn-success btn-save mr-4 pr-4 pl-4'
            ]
        );

        // verifica se é um UPDATE
        if (!empty($id)) {
			// array_push($buttons, $this->hidden('_method', 'PUT'));
            array_push($buttons, $this->hidden('id', $id, ['id' => 'id']));
        }

        array_push($buttons, '<a href="' . route($link) . '" class="btn-transition btn btn-outline-focus btn-cancel mr-4 pr-3 pl-3">');
        array_push($buttons, '    <i class="fas fa-times-circle fa-w-10 pr-2"></i> Cancelar');
        array_push($buttons, '</a>');
        array_push($buttons, $save);

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
     * @return \Illuminate\Support\HtmlString
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
     * @return \Illuminate\Support\HtmlString
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
     * @return \Illuminate\Support\HtmlString
     */
    public function selectSize($name, $selected = null, $options = [])
    {
        $size = [
			''  => 'Selecione',
			'P' => 'P',
			'M' => 'M',
			'G' => 'G',
			'U' => 'Único'
		];

        return $this->select($name, $size, $selected, $options);
    }
}
