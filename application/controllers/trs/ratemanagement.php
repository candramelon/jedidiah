<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ratemanagement extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('trs_ratemanagement');
	}

	public function index()
	{
		$datahead['title'] = "RATE MANAGEMENT";
			$datanav['activenav'] = "transaction";
			$dataside['activesidebar'] = "ratemanagement"; // harus ada isinya
			$databread['breadcumb'] = '<li><a href="">Transaction</a></li>';
			$databread['breadcumb'] .= '<li><i class="fa fa-angle-right"></i><a href="ratemanagement">Rate Management</a></li>';
			
			$this->load->view('template/header.php',$datahead);
			$this->load->view('template/navigation.php',$datanav);
			$this->load->view('template/sidebar_transaction.php',$dataside);
			$this->load->view('template/contentbreadcumb.php',$databread);
			$this->load->view('transaction/ratemanagement/list.php');	
			$this->load->view('template/footer.php');	
	}
	

	public function form($id = 0)
	{

		$data = array();
		if($id==0){

			$get_counter = $this->trs_ratemanagement->get_counter();

			$data['row_id']						= '';
			$data['rate_management_number']		= $get_counter;
			$data['rate_management_date']		= date("m/d/Y");
			$data['rate_management_valid_date']		= date("m/d/Y");
			$data['costumer_code']				= '';
			$data['costumer_name']				= '';
			$data['main_address']				= '';
			$data['main_phone']					= '';
			$data['costumer_email']				= '';
			$data['rate_management_marketing']	= '';
			$data['rate_management_pic']		= '';
			$data['service_marketing_id']		= '';
			$data['service_agent_id']			= '';
			$data['service_shipment_status']	= '1';
			$data['service_moving_type']		= '1';
			$data['service_mode_transport']		= '1';
			$data['product_type']				= '1';
			$data['rate_management_margin']				= '';
			$data['rate_management_type_id']				= '';

		}else{
			$result = $this->trs_ratemanagement->read_id($id);
			if($result){
				$data = $result;
				$data['row_id'] = $id;
				$data['rate_management_date'] = $this->trs_ratemanagement->format_date($data['rate_management_date']);
				$data['rate_management_valid_date'] = $this->trs_ratemanagement->format_date($data['rate_management_valid_date']);
			}
		}

		$datahead['title'] = "FORM RATE MANAGEMENT";
		$datanav['activenav'] = "transaction";
		$dataside['activesidebar'] = "ratemanagement";
		$databread['breadcumb'] = '<li><a href="">Transaction</a></li>';
		$databread['breadcumb'] .= '<li><i class="fa fa-angle-right"></i><a href="">Rate Management</a></li>';
		$databread['breadcumb'] .= '<li><i class="fa fa-angle-right"></i><a href="">Form</a></li>';
		
		

		$this->load->view('template/header.php',$datahead);
		$this->load->view('template/navigation.php',$datanav);
		$this->load->view('template/sidebar_transaction.php',$dataside);
		$this->load->view('template/contentbreadcumb.php',$databread);
		$this->load->view('transaction/ratemanagement/form.php', $data);
		$this->load->view('template/footer.php');	
	}	

	public function commit(){

		$id = $this->input->post('row_id');

		if(empty($id)){			
			$temp = $this->trs_ratemanagement->commit();
			echo json_encode($temp);
		}else{
			$temp = $this->trs_ratemanagement->update($id);
			echo json_encode($temp);
		}
		
	}

	public function getbydetail($id){
		
			$data = $this->trs_ratemanagement->getby($id);
			echo json_encode($data);
	}

	public function getdetailcharge($id){
		
			$data = $this->trs_ratemanagement->getdetailcharge($id);
			echo json_encode($data);
	}

	public function getdetailie($id){
		
			$data = $this->trs_ratemanagement->getdetailie($id);
			echo json_encode($data);
	}

	public function getdetailnote($id){
		
			$data = $this->trs_ratemanagement->getdetailnote($id);
			echo json_encode($data);
	}

	public function deletebl($id){

		
			$this->trs_ratemanagement->deletebl($id);
			echo json_encode("Data deleted");
		
		
	}

	public function deleteie($id){

		
			$this->trs_ratemanagement->deleteie($id);
			echo json_encode("Data deleted");
		
		
	}

	public function deletenote($id){

		
			$this->trs_ratemanagement->deletenote($id);
			echo json_encode("Data deleted");
		
		
	}

	public function delete($ID){
		$result = $this->trs_ratemanagement->delete($ID);
		if($result){
			echo json_encode(true);
		}
		else{
			echo json_encode(false);
		}
	}
	
	
}

/* End of file homecontrol.php */
/* Location: ./application/controllers/home.php */