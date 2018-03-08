<?php 
	class Users extends CI_Model {
		
		var $res = array();
		var $message = 'Page not found';

		public function __construct() {
			$this->load->database();
		}

		public function getUsers($req) {
			
			
			if ($req) {
				$this->db->where("id", $req); 
			} 

			$result=$this->db->get('tbluser')->result();
			
     		$arr_data=array();

    		$i=0;

     		foreach($result as $row)
     		{
        		$arr_data[$i]['id']=$row->id;
         		$arr_data[$i]['username']=$row->username;
         		$arr_data[$i]['email']=$row->email;
         		$arr_data[$i]['type']=$row->type;
       			$i++;  
     		}

     		$this->res['users'] = $arr_data;
			return $this->res; 
		}

		
		public function addUser($req) {
		
			
			if (!$req) {
				show_error($this->message, 404, $heading = 'An Error Was Encountered');
				return;
			}

			$user = array(
				'username'=> isset($req->username)?$req->username:'',
				'password'=> isset($req->password)?md5($req->password):'',
				'email'   => isset($req->email)?$req->email:'',
				'type'    =>'user'
			);

			$result = $this->db->insert('tbluser', $user);
		
			if ($result) {
				$this->res['alert'] = "Added";
			} else {
				$this->res['alert'] = $this->db->error();
			}
			
			return $this->res; 
		}

		public function updateUser($req) {
		
			if (!$req) {
				show_error($this->message, 404, $heading = 'An Error Was Encountered');
				return;
			}

			$user = array(
				'username'=> isset($req->username)?$req->username:'',
				'password'=> isset($req->password)?md5($req->password):'',
				'email'   => isset($req->email)?$req->email:'',
				'type'    =>'user'
			);

			$this->db->set($user); 
			$this->db->where("id", isset($req->id)?$req->id:null); 
			$result = $this->db->update("tbluser", $user);

			if ($result) {
				$this->res['alert'] = "Updated";

			} else {
				$this->res['alert'] = $this->db->error("sdsd");
			}
			$this->res['req'] = $req;
			
			return $this->res; 
		}

		public function removeUser($req) {
		
			if (!$req) {
				show_error($this->message, 404, $heading = 'An Error Was Encountered');
				return;

			}

			$result = $this->db->delete("tbluser", "id = " .$req->id);

			if ($result) {
				$this->res['alert'] = "Success";
			} else {
				$this->res['alert'] = $this->db->error();
			}
			
			return $this->res; 
		}

	}
