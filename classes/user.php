<?php

class user{

    private $_db, 
            $_data, 
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function __construct($user = null){
        $this->_db = DB::getInstance();

        $this->_sessionName = config::get('session/session_name');
        $this->_cookieName = config::get('remember/cookie_name');

        if(!$user){
            if(session::exists($this->_sessionName)){

                $user = session::get($this->_sessionName);
                
                if($this->find($user)){
                    $this->_isLoggedIn = true;
                }
                else{
                    $this->logout();
                }
            }
        }
        else{
            $this->find($user);
        }
    }

    public function create($fields = array()){
        if(!$this->_db->insert('users', $fields)){
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function find($user = null){
        if($user){
            $field = (strlen($user) > 5) ? 'student_id' : 'id'; //TODO , FIXME , this will break if there are ever more than 99000 account creations.
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false){        
        if(!$username && !$password && $this->exists()){
            session::put($this->_sessionName, $this->data()->id);
        }
        else{
            
            $user = $this->find($username);

            if($user){
                if($this->data()->password === hash::make($password)){
                    session::put($this->_sessionName, $this->data()->id);

                     if($remember){
                         $hash = hash::unique();
                         $hashCheck = $this->_db->get('user_session', array('user_id', '=', $this->data()->id));
                     
                         if(!$hashCheck->count()){
                             $this->_db->insert('user_session', array(
                                 'user_id' => $this->data()->id,
                                 'hash' => $hash
                             ));
                         }
                         else{
                             $hash = $hashCheck->first()->hash;
                         }
                     
                         cookie::put($this->_cookieName, $hash, config::get('remember/cookie_expiry'));
                     }
                    return true;
                }
            }
        }
        return false;
    }

    public function update($fields = array(), $id = null){

        if(!$id && $this->isLoggedIn()){
            $id = $this->data()->id;
        }

        if(!$this->_db->update('users', $id,$fields)){
            throw new Exception('There was a problem updating your information');
        }
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }

    public function logout(){
        
        $this->_db->delete('user_session', array('user_id', '=', $this->data()->id));

        session::delete($this->_sessionName);
        cookie::delete($this->_cookieName);
    }

    public function hasPermission($key){
        $group  = $this->_db->get('groups', array('id', '=', $this->data()->group));
        if($group->count()){
           $permissions = json_decode($group->first()->permissions, true);
           if($permissions[$key] == true){
               return true;
           }
        }
        return false;
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
}
