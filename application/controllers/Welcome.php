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

class Welcome extends Application {

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
    public function index($link = null, $playlist = null) {
        $this->params['pagebody'] = 'welcome_message';
        if (!isset($link)) {
            $res = $this->playlist_items->get_as_array(1);
            $this->params['playing'] = $res[0]['link'];
            $this->_highligh_link($res, $res[0]['link']);
            //modify the links
            $this->_link_videos($res, 1);

            $this->params['content'] = $res;
        } else {
            $this->params['playing'] = $link;
            if (isset($playlist)) {
                $res = $this->playlist_items->get_as_array($playlist);
                $this->_highligh_link($res, $link);
                $this->_link_videos($res, $playlist);
                $this->params['content'] = $res;
            }
        }

        $this->render();
    }

    private function _link_videos(&$array, $playlist_id) {
        foreach ($array as &$record) {
            $record['link'] = '/play_video/' . $playlist_id . '/' . $record['link'];
        }
    }

    private function _highligh_link(&$array, $link) {
        foreach ($array as &$record) {
            if ($record['link'] == $link) {
                $record['highlight'] = ' grey-text text-lighten-4 red darken-4 ';
            } else {
                $record['highlight'] = ' red-text text-darken-4 ';
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */