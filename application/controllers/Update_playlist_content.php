<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_playlist_content extends Application {

    public function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }

    function edit_playlist_content($playlist_item, $playlist_id) {
        $this->params['pagebody'] = 'addtoplaylist';
        $this->params['title'] = 'Add/Edit playlist content';
        $this->params['message'] = '';
        $this->params['playlist_id'] = makeTextField('Playlist id', 'playlist_id', $playlist_id, "",  10, 10, true);
        $this->params['link'] = makeTextField('The parameter "v" of the youtube video', 'link', $playlist_item->link);
        $this->params['comment'] = makeTextField('Comments', 'comment', $playlist_item->comment);
        $this->params['submit'] = makeSubmitButton('Process Edit', "Click here to validate the quotation data", 'btn-success');
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $this->params['message'] .= $booboo . '<br/>';
        }

        $this->render();
    }
    
    function add_item_to_playlist($playlist_id){
        $playlist_item = $this->playlist_items->create();
        $this->edit_playlist_content($playlist_item, $playlist_id);
    }

    function confirm_add_playlist() {
        $record = $this->playlist_items->create();
        // Extract submitted fields
        $record->playlist_id = $this->input->post('playlist_id');
        $record->link = $this->input->post('link');
        $record->comment = $this->input->post('comment');
        //throw errors if fields are not filled
        if (empty($record->link))
            //TODO: incorporate youtube api to validate video
            $this->errors[] = 'You must specify the link to the video';
        if (session_get_user() != $this->playlists->getCreator($record->playlist_id))
            $this->errors[] = "You don't have permission to edit this playlist.";
        //check for errors
        if (count($this->errors) > 0) {
            $this->edit_playlist_content($record);
            return; // make sure we don't try to save anything
        }

        //logic to control what to do 
        if (empty($record->id))
            $this->playlist_items->add($record);
        else
            $this->playlist_items->update($record);
        redirect('/play');
    }

}
