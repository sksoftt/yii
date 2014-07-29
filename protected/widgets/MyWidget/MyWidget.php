<?php

class MyWidget
    extends CWidget
{
    public $str = "Empty str";

    
    // override CWidget function
    public function run()
    {
        // render view from sub-directory "views" of widget's folder
        $this->render("viewForWgt");
        
        //or $this-.render("path to view")
        $this->render("views.slava.myview");
    }
}
























