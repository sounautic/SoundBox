<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Application {

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
        $this->get($this->session_get_user());
    }

    public function get($id) {
        $selfid = $this->session_get_user();
        $res = $this->users->get_row_as_array($id);
        if ($res != NULL) {
            if ($selfid == $id || $res['private'] == 0) {
                $this->params['pagebody'] = 'profile';
                //concat the title with the name of the user
                $this->params['title'] = 'Profile of ' . $res['username'];
                $this->params = array_merge($this->params, $res);
                $this->params['playlists'] = $this->playlists->getByCreator($id);
                if ($this->params['pic'] == null) {
                    $this->params['pic'] = 'no_profile_image';
                }
            } else { //trying to access a private profile
                $this->params['pagebody'] = 'errors/profile_no_access';
                $this->params['title'] = 'Ooops!';
            }
        } else {
            $this->params['pagebody'] = 'errors/error_general';
            $this->params['title'] = '404 - Not found!';
            $this->params['message'] = 'The user you are looking for does not exist!';
        }
        if ($selfid == $id)
            $this->params['edit'] = '<a class="red-text text-darken-2" href="/admin/edit_user_profile/'.$this->session_get_user().'">Edit</a>';
        else
            $this->params['edit'] = '';
        $this->render();
    }

//placeholder for getting the user_id from session
    function session_get_user() {
        return 1;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */