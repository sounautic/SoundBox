<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Play extends Application {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->params['pagebody'] = 'play';
        $this->params['title'] = 'My playlists';

        $res = $this->users->first();

        //merge the obtained data
        $this->params = array_merge($this->params, $res);

        $this->render();
    }

    public function play($id) {

        $res = $this->playlists->get($id);
        if ($res['private'] == 'false') {
            $this->params['pagebody'] = 'profile';
            //concat the title with the name of the user
            $this->params['title'] = 'Profile of ' . $res['username'];
            //merge the obtained data
            $this->params = array_merge($this->params, $res);
        } else { //trying to access a private profile
            $this->params['pagebody'] = 'profile_no_access';
            $this->params['title'] = 'Ooops!';
            
        }
        
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */