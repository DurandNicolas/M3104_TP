<?php

class Reviews extends CI_Controller {

	public function show($id) {

		$this->load->model('reviews_model');
		$reviews = $this->reviews_model->get_reviews($id);
		$data['title'] = $reviews['title'];
		$data['grade'] = $reviews['grade'];
		$this->load->view('movie_review', $data);

	}

	public function index($start) {

		$this->load->model('reviews_model');
		$reviews = $this->reviews_model->get_index($start);
		$data['result'] = $reviews;
		$data['start'] = $start;
		$data['max'] = $this->reviews_model->get_nb_reviews();
		$this->load->view('index_review', $data);

	}

}
