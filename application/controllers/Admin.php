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

class Admin extends Application {

    public function __construct() {
        parent::__construct();

        $this->load->model('users');
    }

    public function index() {

        $this->params['pagebody'] = 'admin/main';
        $this->params['title'] = 'Admin';

        $res['userlists'] = $this->users->all();

        //merge the obtained data
        $this->params = array_merge($this->params, $res);
        $this->render();
    }

    public function edit_description() {
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';
        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckfinder/');

        $this->params['pagebody'] = 'admin/edit_user_profile';
        $this->params['title'] = 'Admin';

        $this->render();
    }

    public function edit_user_profile($id) {
        $res = $this->users->get_row_as_array($id);
        if ($res != NULL) {
            if ($res['private'] == 0) {
                $this->params['pagebody'] = 'admin/edit_user_profile';
                $this->params['title'] = 'Admin: Edit Profile of ' . $res['username'];
                $this->params = array_merge($this->params, $res);
                $this->params['playlists'] = $this->playlists->getByCreator($id);

                $this->load->library('ckeditor');
                $this->load->library('ckfinder');
                $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
                $this->ckeditor->config['language'] = 'en';
                $this->ckeditor->config['width'] = '730px';
                $this->ckeditor->config['height'] = '300px';

                $data['user_profile'] = $res['profile'];

                //Add Ckfinder to Ckeditor
                $this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckfinder/');
            } else { //trying to access a private profile
                $this->params['pagebody'] = 'errors/profile_no_access';
                $this->params['title'] = 'Ooops!';
            }
        } else {
            $this->params['pagebody'] = 'errors/error_general';
            $this->params['title'] = '404 - Not found!';
            $this->params['message'] = 'The user you are looking for does not exist!';
        }
        $this->render($data);
    }

    public function upload_receive() {

        $config['upload_path'] = './static/user';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("upload")) {
            echo $this->upload->display_errors();
        } else {
            $CKEDitorFuncNum = $this->input->get('CKEditorFuncNum');

            $data = $this->upload->data();
            $filename = $data['file_name'];
            $url = '/static/user/' . $filename;

            var_dump($data);
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('" . $CKEDitorFuncNum . "','" . $url . "','Complete upload');</script>";
            
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */