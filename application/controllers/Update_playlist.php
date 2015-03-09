<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_playlist extends Application {

    public function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }

    function add_playlist() {
        $playlist = $this->playlists->create();
        $this->edit_playlist($playlist);
    }

    function edit_playlist($playlist) {
        $this->params['pagebody'] = 'addplaylist';
        $this->params['title'] = 'Add/Edit playlist';
        $this->params['message'] = '';
        $this->params['name'] = makeTextField('Playlist Name', 'name', $playlist->name);
        $this->params['private'] = makeTextField('Set Video to Private?', 'private', $playlist->private);
        $this->params['submit'] = makeSubmitButton('Process playlist', "Click here to validate the quotation data", 'btn-success');
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $this->params['message'] .= $booboo . '<br/>';
        }

        $this->render();
    }

    function confirm_add_playlist() {
        $record = $this->playlists->create();
        // Extract submitted fields
        $record->name = $this->input->post('name');
        $record->private = $this->input->post('private');
        $record->creator = $this->session_get_user();
        //throw errors if fields are not filled
        if (empty($record->name))
            $this->errors[] = 'You must specify a name for the playlist.';
        if ($record->private != 0 && $record->private != 1)
            $this->errors[] = 'For the time being private must be set to 0 or 1';
        //check for errors
        if (count($this->errors) > 0) {
            $this->edit_playlist($record);
            return; // make sure we don't try to save anything
        }

        //logic to control what to do 
        if (empty($record->id))
            $this->playlists->add($record);
        else
            $this->playlists->update($record);
        redirect('/play');
    }

    //placeholder for getting the user_id from session
    function session_get_user() {
        return 1;
    }

}
