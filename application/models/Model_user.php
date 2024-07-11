<?php
class Model_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_user');
    }

    public function tambah_user($data)
    {
        $this->db->insert('tb_user', $data);
    }

    public function edit_user($where)
    {
        return $this->db->get_where('tb_user', $where);
    }

    public function md5_password($password)
    {
        return md5($password);
    }


    public function update_user($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tb_user', $data);
    }

    public function hapus_user($where)
    {
        $this->db->where($where);
        $this->db->delete('tb_user');
    }

    function get_user_pagination($limit, $start)
    {
        $this->db->where('role_id', 2); // Menambahkan kondisi where untuk role_id = 2
        $this->db->limit($limit, $start);
        $this->db->order_by('id_user', 'ASC');
        $query = $this->db->get('tb_user');
        return $query->result();
    }

    function count_users()
    {
        $this->db->where('role_id', 2); // Menambahkan kondisi where untuk role_id = 2
        return $this->db->count_all_results('tb_user');
    }

    function count_users_admin()
    {
        $this->db->where('role_id', 1); // Menambahkan kondisi where untuk role_id = 2
        return $this->db->count_all_results('tb_user');
    }
    public function detail_user($id_user)
    {
        $result = $this->db->where('id_user', $id_user)->get('tb_user');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function get_user_by_id($id_user)
    {
        return $this->db->where('id_user', $id_user)->get('tb_user')->row();
    }

    
}
