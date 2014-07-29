<?php

class eventsController
    extends CController
{
    // if onStart going to be event handler it can't be a member of the class
    //public $onStart = null;
    
    public $v;
    public function eventsController()
    {
        // gives ability to add as many events as we want
        $this->attachEventHandler("onStart", array($this, "startEventHandler"));
        $this->detachEventHandler("onStart", array($this, "startEventHandler"));
        
        // have to add to import array in main.php - configuration file
        $this->attachEventHandler("onStart", array(new EventsHandler, "onstartEventHandler"));

        
        // another way to add events
        $this->onStart = function($event)
        {
            print "This anonimus function<br>";
        };
    }


    /*
     * This controller will set and invoke event
     */
    
    public function actionIndex()
    {
        if ($this->hasEvent("onStart"))
        {
            $this->onStart(new CEvent($this));
        }
        
        print "Events";
    }
    
    protected function onStart($event)
    {
        $this->raiseEvent("onStart", $event);
    }
    
    public function startEventHandler($event = null)
    {
        print "This is StartHandler.<br>";
        return;
    }
}


































