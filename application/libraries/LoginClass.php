<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

class LoginClass {
    
 function loginQuery($username, $password)
 {
    $ci =& get_instance();
    $ci->load->database();
    
    $ci->db->select('id, username, password, accounttype');
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
?>