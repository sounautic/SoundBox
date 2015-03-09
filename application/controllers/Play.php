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

        //for the time being we are pretending to be youtuber1
        $res['playlists'] = $this->playlists->getByCreator('1');
        //merge the obtained data
        $this->params = array_merge($this->params, $res);

        $this->render();
    }

    /*
     * for the time being this displays a list of videos. Will eventually
     * integrate the youtube api to create a better UI
     */

    public function play($id) {
        if ($this->playlists->exists($id)) {
            $res = $this->playlists->get_row_as_array($id);
            if ($res['creator'] == session_get_user() || $res['private'] == 0 ) {
                $this->params['pagebody'] = 'play_one';
                //concat the title with the name of the playlist
                $this->params['title'] = 'Playlist - ' . $res['name'];

                $this->params = array_merge($this->params, $res);
                $videos = $this->playlist_items->get_as_array($id);
                $this->_link_videos($videos,$id);
                $this->params['content'] = $videos;
                if($this->params['creator'] == $this->playlists->getCreator($id)) {
                    $this->params['hide_edit'] = '';
                } else $this->params['hide_edit'] = 'hidden';
            } else { //trying to access a private profile
                $this->params['pagebody'] = 'errors/access_restricted';
                $this->params['title'] = 'Ooops!';
            }
        } else {
            $this->params['pagebody'] = 'errors/error_general';
            $this->params['title'] = 'Ooops!';
            $this->params['message'] = 'The playlist you are looking for does not exist!';
        }

        $this->render();
    }

    public function _link_videos(&$array, $playlist_id) {
        foreach ($array as &$record) {
            $record['link'] = '/play_video/' . $playlist_id . '/' . $record['link'];
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */