<?php

class classFilter
    extends CFilter
{
    public $var;
    
 
    
    public function preFilter($filterChain)
    {
        print "\$var: ".$this->var;
        
        return true; //return false - filter will stop all filters and action
        
    }
    
    // this function will run after action ended
    public function postFilter($filterChain)
    {
        return TRUE;
    }
}



































