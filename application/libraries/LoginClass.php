<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginClass {
    
 function loginQuery($username, $password)
 {
    $ci =& get_instance();
    $ci->load->database();
    
    $ci->db->select('id, username, password');
    $ci->db->from('users');
    $ci->db->where('username', $username);
    $ci->db->where('password', MD5($password));
    $ci->db->limit(1);

    $query = $ci->db->get();

    if($query->num_rows() == 1)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
 }
}