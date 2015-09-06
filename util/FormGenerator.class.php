<?php

/**
 * Generador de formularios. 
 * 
 * Crea un formulario a partir de un objeto DTO del modelo.
 * 
 * @version 1.0
 * @copyright (c) 2015, DGTVE
 * @author Israel Toledo <j.israel.toledo@gmail.com>
 */
class FormGenerator {

    /**
     * Objeto html que representa el formulario que se está generando.
     *
     * @var \html_form  
     */
    private $form;
    
    /**
     * Arreglo de elementos HTML que forman parte del formulario.
     * @var array 
     */
    public  $elements = array();
    
    /**
     * Constructor de la clase
     * Recibe el objeto DTO de la tabla de la cual se quiere crear el formulario,
     * así como la acción en forma de cadena a dónde se dirigirá el formulario
     * para guardar los datos. Obtiene los campos del DTO para generar los inputs. 
     * Posteriormente debe ser configurado.
     * 
     * @param _DTO $dto Objeto que tomará como referencia para crear el formulario.
     * @param string $action Acción que se pondrá en el formulario
     */
    public function __construct($dto, $action) {

        $reflect = new ReflectionClass($dto);
        $props = $reflect->getProperties();

        foreach ($props as $prop) {
            $this->elements[$prop->getName()] = new FormElement ($prop->getName ());
        }

        $this->form = new html_element('form');
        $this->form->set('action', $action);
        $this->form->set('method', 'POST');
        $this->form->set('enctype', 'multipart/form-data');
        $this->form->set('class', 'form-horizontal');
    }
    
    /**
     * Obtiene el elemento HTML perteneciente al nombre $name
     * 
     * @param string $name Nombre del elemento que se requiere
     * @return FormElement el elemento solicitado.
     */
    public function get($name){
        return $this->elements[$name];
    }
    
    /**
     * Genera el botón que guarda el formulario
     * 
     * @return \html_element Botón para guardar el formulario
     */
    private function submit() {

        $div = new html_element('div');
        $div->set('class', 'col-sm-offset-2 col-sm-10');

        $button = new html_element('button');
        $button->set('type', 'submit');
        $button->set('class', 'btn btn-primary btn-block');
        $button->set('text', 'Guardar');

        $div->inject($button);
        return $div;
    }

    /**
     * Si se requiere un elemento que no pertenece al DTO se puede usar este
     * método para insertarlo en el formulario. 
     * 
     * @param FormElement $element Elemento que será introducido al formulario
     * @param int $pos Posición en la que se insertará.
     */
    public function addInnerElement(FormElement $element, $pos) {
        $arreglo = array();
        $arreglo [] = $element;
        array_splice ($this->elements, $pos, 0, $arreglo);
    }


    /**
     * Construye el formulario a partir de la creación de todos los elementos
     * internos del mismo.
     * 
     * @return \html_form el formulario creado.
     */
    public function build() { 
//        var_dump ($this->elements );
        foreach ($this->elements as $element) {            
            $this->form->inject($element->build());            
        }
        $this->form->inject($this->submit());
        return $this->form->build();
    }
}
