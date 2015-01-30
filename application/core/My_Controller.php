<?php

/**
 *
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
        $this->params['title'] = 'sounautic';    // our default title
        $this->errors = array();
        $this->params['pageTitle'] = 'welcome';   // our default page
    }

    /**
     * Render this page
     */
    function render() {


        //passing in the page content
        $this->params['content'] = $this->parser->parse(
                $this->params['pagebody'], $this->params, true
        );

        // finally, build the browser page!
        //$this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->params);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */