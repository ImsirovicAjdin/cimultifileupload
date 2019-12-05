<?php
class Posts extends CI_Controller {
	public function index() {
		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->post_model->get_posts(); // lowercase on post_model MUST BE!!!

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
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
