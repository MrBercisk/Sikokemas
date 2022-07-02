<?php

	Class ChatModel extends Model
	{
		function __construct()
		{
			// Wajib Ada
			parent::__construct();
		}

		public function send_chat($data)
		{
			$exe = $this->store('message', $data);

			return $exe;
		}

		public function get_list_contact($id)
		{
			$sql = "SELECT * FROM user WHERE NOT id = {$id};";
			$exe = $this->db->query($sql);

			return $exe;
		}

		public function get_contact_detail($id = null)
		{
			$sql = "SELECT * FROM user WHERE id = {$id};";
			$exe = $this->db->query($sql);

			return (!empty($exe)) ? $exe->fetch_assoc() : [];
		}

		public function get_list_chat($room_id)
		{
			$sql = "SELECT * FROM message WHERE room_id = {$room_id};";
			$exe = $this->db->query($sql);

			return (!empty($exe)) ? $exe : [];
		}

		public function create_room($id, $id2)
		{
			if($id2 !== null)
			{
				// Cek room chat
				$cek = $this->cek_room($id, $id2);

				if($cek['status'] == true)
				{
					return $cek['room_id'];
				}
				else
				{					

					$data['nama'] = generateFont(20);
					$data['type'] = 'Private';

					// Create room
					$exe = $this->store('room', $data);

					// Room id
					$room_id = $this->insert_id();

					// Add participant
					$data2['user_id'] = $id;
					$data2['room_id'] = $room_id;
					$exe2 = $this->store('participants', $data2);
					$data3['user_id'] = $id2;
					$data3['room_id'] = $room_id;
					$exe3 = $this->store('participants', $data3);

					return $exe;
				}
			}

			return false;
		}

		public function cek_room($id, $id2)
		{
			$sql = "SELECT * FROM participants WHERE user_id = {$id};";
			$sql2 = "SELECT * FROM participants WHERE user_id = {$id2};";

			$exe = $this->db->query($sql);
			$exe2 = $this->db->query($sql2);

			foreach($exe as $r)
			{
				foreach ($exe2 as $r2) 
				{
					if($r['room_id'] == $r2['room_id'])
					{
						$data['status'] = true;
						$data['room_id'] = $r['room_id'];
						
						return $data;
					}
				}
			}
		}
	}