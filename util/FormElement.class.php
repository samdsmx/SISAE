<?php

/**
 * Clase para crear elementos de manera automática en un formulario usando
 * Form Generator. 
 * 
 * @version 1.0
 * @copyright (c) 2015, DGTVE
 * @author Israel Toledo <j.israel.toledo@gmail.com>
 */
class FormElement {

    public $label;
    public $isRequired;
    public $options = array();
    public $type;
    public $class;
    public $name;
    public $value;
    public $text;
    public $id;
    public $placeholder;
    public $visible;
    public $selected;

    /**
     * Constructor de la clase. Recibe el nombre del elemento, el cual usa
     * para establecer los atributos como name, id, placeholder y label.
     * Por default el type es text. 
     * 
     * @param string $name Nombre del elemento que se va a construir
     */
    public function __construct($name) {
        $this->label = $this->getTitle($name);
        $this->isRequired = false;
        $this->type = 'text';
        $this->placeholder = $this->getTitle($name);
        $this->class = '';
        $this->name = $name;
        $this->value = '';
        $this->text = '';
        $this->id = $name;
        $this->visible = true;
        $this->selected = '';
    }

    /**
     * Método mágico para establecer valores a los atributos del objeto.
     * 
     * @param string $name Nombre del atributo del objeto que se actualizará.
     * @param string $value Valor nuevo del atributo.
     */
    public function __set($name, $value) {
        $this->$name = $value;
    }

    /**
     * Construye el elemento HTML correspondiente al type del objeto. 
     * 
     * @return El elemento corresponidente al type en html.
     */
    public function build() {
        if (!$this->visible) {
            return '';
        }
        switch ($this->type) {

            case 'radio':
                return $this->radio();

            case 'checkbox':
                return $this->checkbox();

            case 'textarea':
                return $this->textarea();

            case 'select':
                return $this->select();

            default:
                return $this->input();
        }
    }

    /**
     * Crea un radio botón 
     * 
     * @return \html_element el radio botón cteado.
     */
    private function radio() {
        $outdiv = new html_element('div');
        foreach (array_keys($this->options) as $key) {
            $div = new html_element('div');
            $div->set('class', 'radio');
            $label = new html_element('label');
            $input = new html_element('input');
            $input->set('type', 'radio');
            $input->set('name', $this->name);
            $input->set('id', $key);
            $input->set('value', $key);
            $input->set('text', $this->options[$key]);
            $label->inject($input);
            $div->inject($label);
            $outdiv->inject($div);
        }

        return $outdiv;
    }

    /**
     * Crea una caja de check.
     * 
     * TODO la funcionalidad para crear un grupo de checkboxes
     * 
     * @return \html_element la caja creada.
     */
    private function checkbox() {
        $div = new html_element('div');
        $div->set('class', 'checkbox');
        $label = new html_element('label');
        $input = new html_element('input');
        $input->set('type', 'checkbox');
        $input->set('name', $this->name);
        $label->set('text', $this->label);
        $label->inject($input);
        $div->inject($label);
        return $div;
    }

    /**
     * Crea un textarea
     * 
     * @return \html_element el textarea creada
     */
    private function textarea() {
        $div = new html_element('div');
        $div->set('class', 'form-group');

        $label = new html_element('label');
        $label->set('for', $this->id);
        $label->set('text', $this->label);
        $label->set('class', 'col-md-2');

        $div10 = new html_element('div');
        $div10->set('class', 'col-md-10');

        $input = new html_element('textarea');
        $input->set('name', $this->name);
        $input->set('id', $this->id);
        $input->set('placeholder', $this->placeholder);
        $input->set('class', 'form-control');
        $input->setRequired($this->isRequired);

        $div10->inject($input);
        $div->inject($label);
        $div->inject($div10);

        return $div;
    }

    /**
     * Crea un combobox
     * 
     * TODO selección múltiple
     * 
     * @return \html_element el combo creado.
     */
    private function select() {
        $div = new html_element('div');
        $div->set('class', 'form-group');

        $label = new html_element('label');
        $label->set('for', $this->id);
        $label->set('text', $this->label);
        $label->set('class', 'col-md-2');

        $div10 = new html_element('div');
        $div10->set('class', 'col-md-10');

        $select = new html_element('select');
        $select->set('name', $this->name);
        $select->set('id', $this->id);
        $select->set('class', 'form-control');

        foreach (array_keys($this->options) as $key) {
            $option = new html_element('option');
            $option->set('text', $this->options[$key]);
            $option->set('value', $key);
            if ($this->selected == $key){
                $option->setSelected(true);
            }
                
            $select->inject($option);
        }

        $div10->inject($select);
        $div->inject($label);
        $div->inject($div10);
        return $div;
    }

    /**
     * Crea un input.
     * 
     * @return \html_element el input creado.
     */
    private function input() {
        $div = new html_element('div');
        $div->set('class', 'form-group');

        $label = new html_element('label');
        $label->set('for', $this->id);
        $label->set('text', $this->label);
        $label->set('class', 'col-md-2');

        $div10 = new html_element('div');
        $div10->set('class', 'col-md-10');

        $input = new html_element('input');
        $input->set('name', $this->name);
        $input->set('type', $this->type);
        $input->set('id', $this->id);
        $input->set('placeholder', $this->placeholder);
        $input->set('class', 'form-control');
        $input->set('value', $this->value);
        $input->setRequired($this->isRequired);

        $div10->inject($input);
        $div->inject($label);
        $div->inject($div10);

        return $div;
    }

    /**
     * Separa un CamelCase y lo pone en cadena con la primer letra en 
     * mayúscula.
     * 
     * @param String $camelCase Cadena en CamelCase
     * @return Cadena con las palabras separadas por espacios.
     */
    public function getTitle($camelCase) {
        $title = '';

        $words = $this->splitCamelCase(ucfirst($camelCase));

        foreach ($words as $word) {
            $title .= $word . ' ';
        }
        
        if ($this->startsWith($title, "Id")) {
            return trim(substr($title, 2));
        }
        return trim($title);
    }

    /**
     * Separa una cadena en CamelCase en palabras independientes regresa un 
     * arreglo
     * 
     * https://stackoverflow.com/a/23028424/4438727
     */
    function splitCamelCase($input) {
        return preg_split(
                '/(^[^A-Z]+|[A-Z][^A-Z]+)/', $input, -1,
                /* no limit for replacement count */ PREG_SPLIT_NO_EMPTY
                /* don't return empty elements */ |
                PREG_SPLIT_DELIM_CAPTURE
                /* don't strip anything from output array */
        );
    }

    /**
     * http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
     * 
     * @param type $haystack
     * @param type $needle
     * @return type
     */
    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }

    function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
    }

}
