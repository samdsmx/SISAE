<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of html_element
 *
 * @author Israel
 */

class html_element
{
	/* vars */
	var $type;
	var $attributes;
	var $self_closers;
        var $required = false;
        var $selected = false;
        
        
	
	/* constructor */
	function html_element($type,$self_closers = array('input','img','hr','br','meta','link'))
	{
		$this->type = strtolower($type);
		$this->self_closers = $self_closers;
                $this->attributes['text'] = '';
	}
	
	/* get */
	function get($attribute)
	{
		return $this->attributes[$attribute];
	}
        
        function setRequired ($required){
            $this->required = $required;
        }
        function setSelected ($selected){
            $this->selected = $selected;
        }
	
	/* set -- array or key,value */
	function set($attribute,$value = '')
	{
		if(!is_array($attribute))
		{
			$this->attributes[$attribute] = $value;
		}
		else
		{
			$this->attributes = array_merge($this->attributes,$attribute);
		}
	}
	
	/* remove an attribute */
	function remove($att)
	{
		if(isset($this->attributes[$att]))
		{
			unset($this->attributes[$att]);
		}
	}
	
	/* clear */
	function clear()
	{
		$this->attributes = array();
	}
	
	/* inject */
	function inject($object)
	{
		if(@get_class($object) == __class__)
		{
			$this->attributes['text'].= $object->build();
		}
	}
	
	/* build */
	function build()
	{
		//start
		$build = '<'.$this->type;
		
		//add attributes
		if(count($this->attributes))
		{
			foreach($this->attributes as $key=>$value)
			{
				if($key != 'text') { $build.= ' '.$key.'="'.$value.'"'; }
			}
		}
		if ($this->required){
                    $build.= ' required';
                }
                if ($this->selected){
                    $build.= ' selected';
                }
		//closing
		if(!in_array($this->type,$this->self_closers))
		{
			$build.= '>'.$this->attributes['text'].'</'.$this->type.'>'."\n";
		}
		else
		{
			$build.= ' />'."\n";
		}
		
		//return it
		return $build;
	}
	
	/* spit it out */
	function output()
	{
		echo $this->build();
	}
}