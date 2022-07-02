<?php

	Class Home extends Controller
	{
		public function index()
		{
			$data['list_user'] = $this->model('m_user')->get_user();

			$this->view('home', $data);
		}
	}