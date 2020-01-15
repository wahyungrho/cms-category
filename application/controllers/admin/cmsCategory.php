<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cmsCategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cms','model');
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->session->userdata('authenticated')){
			redirect('admin/cmsCategory/dashboard');
		}
		
		$this->load->view('admin/login');
	}

	public function dashboard()
	{
		if (!$this->session->userdata('authenticated')){
			redirect('admin');
		}

		$this->load->view('admin/dashboard');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$user = $this->model->getUsername($username);

		if (empty($user)) {
			$this->session->set_flashdata('message', 'Maaf, username tidak ditemukan !');
			redirect('admin');
		} else
		{
			if ($password == $user->password) {
				$session = array(
					'authenticated'=>true,
					'username'=>$user->username,
					'nama'=>$user->nama
				);

				$this->session->set_userdata($session);
				redirect('admin');
			} else
			{
				$this->session->set_flashdata('message', 'Maaf, password anda salah !');
				redirect('admin');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
	// public function tambah(){

		

	// 	$kategori = new stdClass();
	// 	$kategori->hash_breadcrumb = null;
	// 	$kategori->breadcrumb = null;
	// 	$kategori->id_situs = null;
	// 	$kategori->p_cat_sd = null;
	// 	$kategori->k_cat_sd = null;
	// 	$kategori->c_cat_sd = null;

	// 	$data = array(
	// 		'page' => 'add',
	// 		'row' => $kategori
	// 		);

	// 	$data["parent"] = $this->model->getKategori('parent');
	// 	$data["category"] = $this->model->getKategori('category');
	// 	$data["child"] = $this->model->getKategori('child');

	// 	$this->load->view('admin/proses/new_form', $data);
	// }

	// public function process(){
	// 	$post = $this->input->post(null, TRUE);
	// 	if (isset($_POST['add'])) {
	// 		$this->model->save($post);
	// 	}

	// 	if($this->db->affected_rows()>0) {
	// 		$this->session->set_flashdata('success', 'Berhasil disimpan');
	// 	}
	// 	echo "<script>window.location='".site_url('admin')."';</script>";

	// }

	public function add(){

		if (!$this->session->userdata('authenticated')){
			redirect('admin');
		}

		$data["parent"] = $this->model->getKategori('parent');
		$data["category"] = $this->model->getKategori('category');
		$data["child"] = $this->model->getKategori('child');
		$data["id_situs"] = $this->model->getIdSitus('id_situs');
		// print_r($data); exit();

		

		$valid = $this->model;
        $validation = $this->form_validation;
        $validation->set_rules($valid->rules());

        if ($validation->run()) {
            $valid->save();
            $this->session->set_flashdata('success', 'Data berhasil disimpan');

            redirect('admin/cmsCategory/dashboard', $data);

        }

        $this->load->view('admin/proses/new_form', $data);


	}

	private function Debug($item){
		echo "<pre>";
		print_r($item); 
		die();
	}



	public function edit(){

		//fungsi edit untuk menangkap file edit_form yang dikirim dari dashboard button update

		$id = $_GET['id'];
		if(!isset($id)) redirect('admin/cmsCategory/dashboard');

		$mapping_schema = $this->model->getALL($id);
		// $this->Debug($mapping_schema);
		$data["mapping_schema"] = $mapping_schema;
    	$data["parent"] = $this->model->getKategori('parent');
		$data["category"] = $this->model->getKategori('category');
		$data["child"] = $this->model->getKategori('child');


		// $valid = $this->model;
  //       $validation = $this->form_validation;
  //       $validation->set_rules($valid->rules());

  //       if ($validation->run()) {
  //           $valid->update();
  //           $this->session->set_flashdata('success', 'Berhasil disimpan');

  //       }

		$this->load->view('admin/proses/edit_form', $data);

	}

	public function update()
    {
    	// fungsi update ini aksi dari proses update yang ditangkap dari fungsi model update

    	$id = $this->input->post('id');
		$breadcrumb = $this->input->post('breadcrumb');
		$id_situs = $this->input->post('id_situs');
		$p_cat_sd = $this->input->post('p_cat_sd');
		$k_cat_sd = $this->input->post('k_cat_sd');
		$c_cat_sd = $this->input->post('c_cat_sd');

		$valid = $this->model;
        $validation = $this->form_validation;
        $validation->set_rules($valid->rules());

        if ($validation->run()) {
            $data["queryUpdate"] = $this->model->update($id,$breadcrumb,$id_situs,$p_cat_sd,$k_cat_sd,$c_cat_sd);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/cmsCategory/dashboard', $data);
        }
		
 //    	if (!isset($id)) redirect('admin');
       
 //        $valid = $this->model;
 //        $validation = $this->form_validation;
 //        $validation->set_rules($valid->rules());

 //        if ($validation->run()) {
 //            $valid->update();
 //            $this->session->set_flashdata('success', 'Berhasil disimpan');
 //        }

 //        $data["valid"] = $valid->getId($id);
 //        if (!$data["valid"]) show_404();
        
        
    }

    public function delete($id=null)
    {
    	$id = $_GET['id'];
        if (!isset($id)) show_404();
        
        if ($this->model->delete($id)) {
        	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect(site_url('admin/cmsCategory/dashboard'));
        }
    }

	function json(){
		$list = $this->model->get_datatables();
		$data = array();
		foreach ($list as $items) {
			$row = array();
			$row[] = $items->hash_breadcrumb;
			$row[] = $items->breadcrumb;
			$row[] = $items->id_website;
			$row[] = $items->p_cat_sd;
			$row[] = $items->k_cat_sd;
			$row[] = $items->c_cat_sd;
			/*
			$row[] = '<a class="btn btn-success btn-sm data-id="'.$items->hash_breadcrumb.'" id="btn-edit"><i class="fa fa-edit"></i> Update</a>
				<a class="btn btn-danger btn-sm id="btn-hapus" data-id="'.$items->hash_breadcrumb.'" id="btn-hapus"><i class="fa fa-trash"></i> Delete</a>';
				*/
				$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"recordTotal" => $this->model->count_all(),
			"recordFiltered" => $this->model->count_filtered(),
			"data" => $data,
			);
		echo json_encode($output);
	}


}
