<?php
	class Api extends CI_Controller{
		
		public function __construct() {
			parent::__construct();
			$this->load->model('users');
		}


		public function users($req = false) {

			$data['res'] = $this->users->getUsers($req);
			
			$this->load->view('api/view', $data);
		}

		public function postUser() {
			
			$req = json_decode(file_get_contents("php://input"));
			
			$data['res'] = $this->users->addUser($req);

			$this->load->view('api/view', $data);
		}

		public function putUser() {
			
			$req = json_decode(file_get_contents("php://input"));
			
			$data['res'] = $this->users->updateUser($req);

			$this->load->view('api/view', $data);
		}

		public function deleteUser() {
			
			$req = json_decode(file_get_contents("php://input"));
			
			$data['res'] = $this->users->removeUser($req);

			$this->load->view('api/view', $data);
		}
	}