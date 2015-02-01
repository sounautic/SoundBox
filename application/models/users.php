<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Users extends CI_Model {

    // mock data. Will be replaced with a sql data source eventually
    var $data = array(
        array('id' => '1', 'username' => 'youtuber1', 'location' => 'Vancouver',
            'first_name' => 'John', 'last_name' => 'Smith',
            'pic' => 'youtuber1.jpg', 'private' => 'false'),
        array('id' => '2', 'username' => 'youtuber2', 'location' => 'unknown', 
            'first_name' => 'Waldo', 'last_name' => '',
            'pic' => 'youtuber2.png', 'private' => 'true'),
        array('id' => '3', 'username' => 'youtuber3', 'location' => 'unknown',
            'first_name' => 'Jerry', 'last_name' => 'Li',
            'pic' => 'youtuber3.png', 'private' => 'false')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single user identified by the user id
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $user) {
            if ($user['id'] == $which) {
                return $user;
            }
        }
        return null;
    }

    // retrieve all users
    public function all() {
        return $this->data;
    }

    // retrieve the first user
    public function first() {
        return $this->data[0];
    }

    // retrieve the last user
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }

}
