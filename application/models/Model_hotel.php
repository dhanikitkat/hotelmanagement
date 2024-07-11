<?php
class Model_hotel extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('hotel');
    }

    public function tambah_hotel($data)
    {
        $this->db->insert('hotel', $data);
    }

    public function edit_hotel($where)
    {
        return $this->db->get_where('hotel', $where);
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('hotel', $data);
    }

    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('hotel');
    }

    public function find($id)
    {
        $result = $this->db->where('id_hotel', $id)->limit(1)->get('hotel');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return null;
        }
    }

    public function detail_hotel($id_hotel)
    {
        $result = $this->db->where('id_hotel', $id_hotel)->get('hotel');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_data_hotel_by_id($id_hotel)
    {
        $this->db->where('id_hotel', $id_hotel);
        return $this->db->get('hotel');
    }

    function get_hotel_pagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id_hotel', 'ASC');
        $query = $this->db->get('hotel');
        return $query->result();
    }


    function count_hotels()
    {
        return $this->db->count_all_results('hotel');
    }
   
}
