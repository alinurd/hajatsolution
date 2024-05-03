<?php defined('BASEPATH') or exit('No direct script access allowed');

class Owner_model extends CI_Model
{

    public function booking_values()
    {
        $data = array(
            'nama' => remove_forbidden_characters($this->input->post('nama', true)),
            'tenor' => remove_forbidden_characters($this->input->post('tenor', true)),
            'tanggal_acara' => remove_forbidden_characters($this->input->post('tgl', true)),
            'hp' => remove_forbidden_characters($this->input->post('hp', true)),
            'email' => remove_forbidden_characters($this->input->post('email', true)),
            'alamat' => remove_forbidden_characters($this->input->post('alamat', true)),
            'group_id' => remove_forbidden_characters($this->input->post('group_id', true)),
            'post_id' => remove_forbidden_characters($this->input->post('post_id', true)),
         );
        return $data;
    }
    
    public function insert_booking()
    {

        $data = $this->owner_model->booking_values();



        $datax['group_id'] = $data['group_id'];
        $datax['tanggal'] = $data['tanggal_acara'];
        $datax['post_id'] = $data['post_id'];
        $datax["created_at"] = date('Y-m-d H:i:s');
        $this->db->insert('jadwal', $datax);


         $data['token'] = generate_unique_id();
        $data['code'] = generate_code_trans();
        $data["created_at"] = date('Y-m-d H:i:s');
        return $this->db->insert('booking', $data);
    }

  //check if email is unique
  public function is_unique_email($email, $user_id = 0)
  {
      $user = $this->auth_model->get_owner_by_email($email);

      //if id doesnt exists
      if ($user_id == 0) {
          if (empty($user)) {
              return true;
          } else {
              return false;
          }
      }

      if ($user_id != 0) {
          if (!empty($user) && $user->id != $user_id) {
              //email taken
              return false;
          } else {
              return true;
          }
      }
  }

  public function get_owner_by_email($email)
  {
      $this->db->where('email', $email);
      $query = $this->db->get('owner');
      return $query->row();
  }

  public function insert()
  {
      $this->load->library('bcrypt');
      $data = $this->owner_model->input_values();
       $data['token'] = generate_unique_id();
        // $data['last_seen'] = date('Y-m-d H:i:s');
      $data["created_at"] = date('Y-m-d H:i:s');
      $data["created_by"] = date('Y-m-d H:i:s');

      return $this->db->insert('owner', $data);
  }




}