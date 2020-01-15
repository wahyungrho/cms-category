<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class m_cms extends CI_Model {

	var $table = 'mapping_schema';
	var $key = 'hash_breadcrumb';
	var $column_order = array(null, 'breadcrumb', 'id_website', 'p_cat_sd', 'k_cat_sd', 'c_cat_sd');
	var $column_search = array( 'id_website');
	var $order = array('hash_breadcrumb' => 'desc');

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) {
			if (@$_POST['search']['value']) {
				if($i === 0)
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if(@$_POST['length'] != -1)
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function getALL($id)
	{
		$sql="SELECT * from mapping_schema WHERE hash_breadcrumb='$id'";
		return $this->db->query($sql)->result();
	}

	public function getIdSitus($id_situs)
	{
		$sql = "SELECT id_website, nama FROM website_t_website GROUP BY id_website";
		return $this->db->query($sql)->result();
	}

	public function getKategori($tipe)
	{
		$sql="SELECT * from category WHERE tipe='$tipe'";
		return $this->db->query($sql)->result();
	}

	public $hash_breadcrumb;
	public $breadcrumb;
	public $id_situs;
	public $p_cat_sd;
	public $k_cat_sd;
	public $c_cat_sd;

	public function rules() {
		return [
			 ['field' => 'breadcrumb',
			 'label' => 'Breadcrumb',
			 'rules' => 'required'],

			 ['field' => 'id_situs',
			 'label' => 'Id_situs',
			 'rules' => 'required'],
		];
	}

	public function getId($id){
		return $this->db->get_where($this->table, ["hash_breadcrumb" => $id])->row();
	}

	public function save()
	{
		
		$hash_breadcrumb = $this->hash_breadcrumb = uniqid();
		$breadcrumb = $this->input->post('breadcrumb');
		$id_situs = $this->input->post('id_situs');
		$p_cat_sd = $this->input->post('p_cat_sd');
		$k_cat_sd = $this->input->post('k_cat_sd');
		$c_cat_sd = $this->input->post('c_cat_sd');
		
		$sql="INSERT INTO mapping_schema (hash_breadcrumb, breadcrumb, id_website, p_cat_sd, k_cat_sd, c_cat_sd) VALUES ('$hash_breadcrumb', '$breadcrumb', '$id_situs', '$p_cat_sd', '$k_cat_sd', '$c_cat_sd')";

		return $this->db->query($sql);
	}
	
	

	public function update($id,$breadcrumb,$id_situs,$p_cat_sd,$k_cat_sd,$c_cat_sd)
    {
        // $post = $this->input->post();
        // $this->hash_breadcrumb = $post["id"];
        // $this->breadcrumb = $post["breadcrumb"];
        // $this->id_situs = $post["id_situs"];
        // $this->p_cat_sd = $post["p_cat_sd"];
        // $this->k_cat_sd = $post["k_cat_sd"];
        // $this->c_cat_sd = $post["c_cat_sd"];
        // $this->db->update($this->_table, $this, array('hash_breadcrumb' => $post['id']));
        $hasil=$this->db->query("UPDATE mapping_schema SET hash_breadcrumb='$id',
															breadcrumb='$breadcrumb', 
															id_website='$id_situs', 
															p_cat_sd='$p_cat_sd', 
															k_cat_sd='$k_cat_sd', 
															c_cat_sd='$c_cat_sd' WHERE hash_breadcrumb='$id'");

		return $hasil;
    }

	public function delete($id){
		$hasil=$this->db->query("DELETE FROM mapping_schema WHERE hash_breadcrumb='$id'");
		return $hasil;
	}

	function show($id)
	{
		$this->db->where($this->key, $id);
		return $this->db->get($this->table)->row();
	}

	function truncate(){
		$this->db->truncate($this->table);
	}

	public function getUsername($username){
		$this->db->where('username', $username);
		$result = $this->db->get('user')->row();

		return $result;
	}
}


?> 