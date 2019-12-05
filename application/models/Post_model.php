<?php
	class Post_model extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_posts($slug = FALSE){
			if($slug === FALSE){

				$this->db->order_by('id', 'DESC'); // an example of an active record entry

				$query = $this->db->get('posts'); // we're using active model here
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		
		// Insert values from $_POST from posts/create to DB using CI's active record
		public function create_post(){
			$slug = url_title($this->input->post('title')); // this is how we get the form values
			// and we want the value of title - so we're just wrapping the ('title') in this
			// url_title function, which turns it into a slug
			$data = array(
				'title' => $this->input->post('title'), // we're creating a 'title' key in the
				// $data array, and we're setting it to whatever came in from
				// $_POST['<name="title"> form field']
				'slug' => $slug, // the slug will come from the slug variable we just created,
				'body' => $this->input->post('body')
			); // so there's our array, we still need to pass it TO DB, using RETURN stmt below:
			return $this->db->insert('posts', $data);
		}

		public function delete_post($id) {
			$this->db->where('id', $id); // find post where 'id' is equal to '$id'
			$this->db->delete('posts'); // delete the post ID you've found above, from tbl 'posts'
			return true;
		}

		public function update_post() {
			// echo $this->input->post('id');die();
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);			
		}

	}
