<?php
class Model_auth extends CI_Model
{
    public function cek_login()
    {
        $username = set_value('username');
        $password = md5(set_value('password'));

        $result = $this->db->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get('tb_user');
            
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    
    public function get_user_by_username_email($username, $email)
    {
        $this->db->where('username', $username);
        $this->db->where('email_user', $email);
        return $this->db->get('tb_user')->row();
    }

    public function update_password($userId, $newPassword)
    {
        $newPasswordHash = md5($newPassword);
        $this->db->where('id_user', $userId);
        $this->db->update('tb_user', array('password' => $newPasswordHash));
    }


}
