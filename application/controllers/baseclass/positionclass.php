<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Positionclass extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mst_position');
	}

	public function index()
	{
		$data = $this->mst_position->getall();
		echo json_encode($data);
	}
	
	public function commit(){
		$this->mst_position->commit();
		echo json_encode("Data Saved");
	}
	
	public function delete($ID){
		$result = $this->mst_position->delete($ID);
		if($result){
			echo json_encode(true);
		}
		else{
			echo json_encode(false);
		}
	}
	
	public function getrow($ID){
		$result = $this->mst_position->getrow($ID);
		echo json_encode($result);
	}
	
}

/* End of file cityclass.php */
/* Location: ./application/controllers/baseclass/cityclass.php */