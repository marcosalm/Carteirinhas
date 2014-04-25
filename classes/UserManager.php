<?php

require_once "User.php";
require_once "Database.php";

class UserManager {

  private $db;
    
    public function UserManager() {
        $this->db = new Database();
    }  
	
	  public  function createUser($username, $password, $email) {
        
         $stmt = sprintf("INSERT INTO users (`username`,  `password`,  `email`) VALUES ('%s', '%s', '%s')",
                $this->db->real_escape_string($username),
                 md5($this->db->real_escape_string($password)),     // A  md5 hash of the user's password will be stored in the database.
                 $this->db->real_escape_string($email),             //  always escape data from public before storing in database
                $result = $this->db->query($stmt);

        if($result) return true;
        return false;
    }  
 public function updateUser($user)
    {
        // Normally I wouldn't store session data in the database, but 
        // it can be changed to track cookies if you plan to go that
        // route.
        $session = $user->get('session');
        if(!$session) $session = 0;
         $stmt = sprintf("UPDATE users SET `username` = '%s', `password`  =  '%s', `email` = '%s' WHERE `id`  =  '%d'",
                $this->db->real_escape_string($user->get('username')),
                $this->db->real_escape_string($user->get('password')), 
                $this->db->real_escape_string($user->get('email')), 
                $this->db->real_escape_string($user->get('id')));
        return $this->db->query($stmt);
                
    }  
	
	 public function deleteUser($user)
    {
        $userID = $this->db->real_escape_string($user->get('id'));
        return $this->db->query("DELETE FROM users WHERE `id` = '$userID'");
     }  
	 
	    public function getUserByID($id) {
        // get the user by id from database
        $stmt = sprintf("SELECT * FROM users WHERE id = '%s'", $this->db->real_escape_string($id));
        $result = $this->db->query($stmt);
        if($result)
        {
            $user = new User();                            // create a new user object
            $row = $this->db->fetch_assoc($result);
            foreach($row as $key => $value)                // loop through user table values
            {
                $user->set($key, $value);                // store them in the user object
            }
            return $user;                                // and return it
        }
        return NULL;
    }
    
    public function getUserByName($name) {

        $stmt = sprintf("SELECT * FROM users WHERE username = '%s'", $this->db->real_escape_string($name));
        $result = $this->db->query($stmt);
        if($result && $this->db->num_rows($result) > 0)
        {
            $user = new User();
            $row = $this->db->fetch_assoc($result);
            foreach($row as $key => $value)
            {
                $user->set($key, $value);
            }
            return $user;
        }
        
        return NULL;
    }  
	
	    public function login($username,  $password)
    {
        $user = $this->getUserByName($username);
        if(isset($user) && $user->checkPassword($password))
        {
            session_start();
            $_SESSION['zhuser'] = $user->get('username');            // I normally use these for cookies
            $_SESSION['zhsess'] = md5($username.microtime());        // "
            $user->set('session', $_SESSION['zhsess']);                // set the session in user object
            $this->updateUser($user);                                // update the user
            return $user;                                            // and return the user object if we're good
        }
        return NULL;
    }    
    public function logout() {
        session_start();
        unset($_SESSION);
        session_destroy();
    }  
	  public  function getSession()  {
        session_start();
        if(isset($_SESSION['zhuser']) && isset($_SESSION['zhsess']))
        {
            $user = $this->getUserByName($_SESSION['zhuser']);
            if(!$user) $this->logout();
            if($user->get('session') == $_SESSION['zhsess'])
            {
                return $user;
            }
        }
        return NULL;
    }  
	
	
   