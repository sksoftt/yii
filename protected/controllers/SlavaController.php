<?php

class slavaController
    extends CController
{
    public function slavaController()
    {
        parent::__construct("slava");
    }

    public static $SLAVA = "try";
    
    // actionIndex - this is default index action
    
    public function actionIndex($var = null)
    {
        $args = func_get_args();
        if ($var != null)
        {
            print ("This is the Slava->index->\$var= " . $var);
        }
        print("   This is the action controller");
        $url = $this->createUrl("application.SlavaController");
        
        return;
    }
    
    /*
     * actions can be implemented by classes
     */
    public function actions()
    {
        return array
        (
            // nameOfAction => "path to class of action"
            "classAction" => "actions.classAction",
            
            // "name of the action"=> array
            "classArrayAction" => array
            (
                // path to class
                "class" => "actions.classAction", //set class of action
                
                //set class member $this->v = 12;
                // the property have to be "public"
                // the property need to have the same name 
                "v" => 12, 
            ),
        );
    }
    
    // to use filters implemented by classes
    // need to override "filters()" function
    public function filters()
    {
        return array
        (
            // filterTry will work for action "classAction"
          //  "Try + classAction",
            
            // "Try - classAction", - will work for all actions exept classAction
            
            
            // implementing filter by class
            array
            (
                "filters.classFilter + classAction",
                "var" => 15, //init filter class member (this member have to be public)
            ),
            
        );
    }
    
    public function filterTry($filterChain)
    {
        $filterChain->run(); //this will run other filters and action
        return;
    }
    
    public function actionShowMyView()
    {
        // view have to be in protected/views/controllerOd folder (default)
        // or $this->render("path to view"); - aliales can be used
        // with array we can to send variables to view

        
        $this->render('myView');
        
        $this->render('myView', array("var" => "Drupal must die!!"));
        
        
        // in this case render will return view's output to variable
        $view = $this->render("myView", null, true);
    }
    
        // this action for widget try
    public function actionWgt()
    {
        
        /*
         * Widget is an object that can render some parts of view (calendar for example)
         * Widget can be invoked from controller or from view
         * by run function $this-widget("path to widget")
         * or
         * $this->beginWidget("Path to widget", array("widgetProperty" => value))
         * $this->endWidget()
         * 
         * Widget can implement it's own view.
         * This view, by default have to be in the same folder where widget class is
         * in sub-folder "Views"
         * or
         * $this->render("path to view")
         */
        
        
        $this->beginWidget("widgets.MyWidget.MyWidget", array("str" => "this is str"));
        $this->endWidget();
        
        $this->beginWidget("application.widgets.MyWidget.MyWidget");
        $this->render("forWgt");
    }
    
}

































?>