<?php defined('BASEPATH') or exit('No direct script access allowed');

class Owner_model extends CI_Model
{

    public function input_values()
    {
        $data = array(
            'name' => remove_forbidden_characters($this->input->post('name', true)),
            'email' => remove_forbidden_characters($this->input->post('email', true)),
            'alamat' => remove_forbidden_characters($this->input->post('alamat', true)),
         );
        return $data;
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