<?php 

class Post extends CFormModel
{

    public $title;
	public $content;

    public function rules()
    {
        return array(
            array('title, content', 'required'),      
        );
    }

}