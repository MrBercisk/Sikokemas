<?php

class Chat extends CI_Controller
{
	public function as($id, $id2 = null)
	{
		$data['id'] 				= $id;
		$data['id2'] 				= $id2;
		$data['list_contact'] 		= $this->model('chatModel')->get_list_contact($id);
		$data['contact_detail'] 	= $this->model('chatModel')->get_contact_detail($id2);

		// Create room chat
		$create_room 				= $this->model('chatModel')->create_room($id, $id2);

		// Get chat
		$data['chat'] 				= $this->model('chatModel')->get_list_chat($create_room);
		$data['room_id'] 			= $create_room;

		$this->view('chat1', $data);
	}

	public function send_chat()
	{
		/**
		 * APP_KEY Pusher liblary
		 * 
		 * 
		 * key = "< API KEY YANG ADA DI PUSHER.COM >"
		 * secret = "< SECRET KEY YANG ADA DI PUSHER.COM >"
		 * cluster = "ap1"
		 *
		 *
		 *
		 **/

		$options 						= array(
			'cluster' 	=> 'ap1',
			'useTLS' 	=> true
		);

		$pusher 						= new Pusher\Pusher(
			'< API KEY YANG ADA DI PUSHER.COM >',
			'< SECRET KEY YANG ADA DI PUSHER.COM >',
			'1083777',
			$options
		);


		$data['room_id']				= $_POST['room_id'];
		$data['sender_id']				= $_POST['sender_id'];
		$data['receiver_id'] 			= $_POST['receiver_id'];
		$data['message']				= $_POST['message'];

		$exe 							= $this->model('chatModel')->send_chat($data);

		$pusher->trigger('chat', 'pesan-datang', $data);

		echo json_encode(1);
	}
}
