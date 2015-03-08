<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Sessions extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('session','user_id'); 
    }
    
    public function isLoggedIn($id) {
        if( $this->exists($id) ) { //TODO: timestamp logic
            return true;
        }
        
        return false;
    }
    
    public function doLogout($id) {
        //TODO:actual logout logic
        $this->remove($id);
    }
    
    public function doLogIn($id, $password = "placeholder") {
        //TODO: validation logic
        
        $params = array('user_id'=>$id,'last_action'=>$this->db->now());
        $this->add($params);
    }
}
