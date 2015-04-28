<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginClass {
    
 function loginQuery($username, $password)
 {
    $this -> db -> select('id, username, password');
    $this -> db -> from('users');
    $this -> db -> where('username', $username);
    $this -> db -> where('password', MD5($password));
    $this -> db -> limit(1);

    $query = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
 }
}