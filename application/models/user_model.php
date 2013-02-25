<?php

class User_model extends CI_Model
{
    //Signs up a user with the given params
    public function sign_up_user($firstName = '', $lastName = '', $email = '', $password = '')
    {
        if($firstName === '' OR $lastName === '' OR $email === '' OR $password === '')
        {
            log_message('error', 'Necessary params were not sent to User_model.sign_up_user()');
        }
        else
        {
            $data = array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => $password
            );

            $this->db->insert('pm_user', $data); 
            return $this->db->insert_id();
        }
    }

    //Gets user by user id
    public function get_by_id($userId = -1)
    {
        if($userId === -1)
        {
            log_message('error', 'Necessary params were not sent to User_model.get_by_id()');
        }
        else
        {
            $data = array(
                'id' => $userId
            );

            return $this->db->get_where('pm_user', $data)->row();
        }
    }
}

/* End of file user_model.php */