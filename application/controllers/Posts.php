<?php
class Posts extends CI_Controller {
	public function index() {
		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->post_model->get_posts(); // lowercase on post_model MUST BE!!!

		// print_r($data['posts']); it WORKS, we know we're passing data along into the $data variable

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL) {
		$data['post'] = $this->post_model->get_posts($slug);
		if(empty($data['post'])){
			show_404();
		}
		$data['title'] = $data['post']['title'];
		print_r($data['title']);
		print_r($data);

		print_r($data['post']);

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function create() {
		$data['title'] = 'Create Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		if($this->form_validation->run() === FALSE){ // i.e "if the form validation doesn't run"
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}else{
			$this->post_model->create_post();
			$this->load->view('posts/success');
		}

	}

}
/*

How is data passed from the controller to the view?

Data is passed from the controller to the view by way of 
an array or an object.

This array or object is specified as the second argument of the view loading method.

Here's an exmaple using an array:
---------------------------------
$data = array(
	'title' => 'My title',
	'heading' => 'My heading',
	'message' => 'My Message'
);
$this->load->view('blogview', $data);

Here's an example using an object:
----------------------------------
$data = new Someclass();
$this->load->view('blogview', $data);

*/
