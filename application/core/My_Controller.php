<?php

/**
 * Default controller
 */
class Application extends CI_Controller {

    protected $param;      //view parameters
    protected $id;         // identifier for our content
    protected $errors;

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->params = array();
        $this->params['title'] = 'SoundBox'; 
        $this->errors = array();
        $this->params['pageTitle'] = ''; 
    }

    /**
     * Render this page
     */
    function render() {


        //passing in the page content
        $this->params['content'] = $this->parser->parse(
                $this->params['pagebody'], $this->params, true
        );


        //using the parser to build the webpage
        $this->parser->parse('_template', $this->params);
    }

}
