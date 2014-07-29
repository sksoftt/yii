<?php

class classAction
    extends CAction
{
    public $v = 10;
    
    public function classAction($str = null)
    {
        $this->v = $str;
    }

    //all actions implemented with class invoke function "run()"
    public function run($var = null)
    {
        if ($var)
        {
            print "This is classAction and the \$var: ".$var;
            return;
        }
        
        print "This is the classAction.";
        return;
    }
}































