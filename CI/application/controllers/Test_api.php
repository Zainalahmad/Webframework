<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Test_api extends Ci_Controller
{
	function index()
	{
		$this->load->view('api_View');
	}

	function action()
	{
		if($this->input->post('data_action')) {
			$data_action=$this->input->post('data_action');

			if ($data_action=="Delete") {
				$api_url= "http://localhost/Webframework/CI/index.php/api/delete";
				$form_data = array('nim' => $this->input->post('nim'));
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response=curl_exec($client);
				curl_close($client);
				echo $response;
			}
			if ($data_action=="Edit") {
				$api_url = "http://localhost/Webframework/CI/index.php/api/update";
				$form_data = array('nim' => $this->input->post('nim'), 'nama' => $this->input->post('nama'));
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response=curl_exec($client);
				curl_close($client);
				echo $response; 
			}
			if ($data_action=="fetch_single") {
				$api_url = "http://localhost/Webframework/CI/index.php/api/fetch_single";
				$form_data = array('nim' => $this->input->post('nim'));
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response=curl_exec($client);
				curl_close($client);
				echo $response; 
		}
		if ($data_action=="Insert") {
				$api_url = "http://localhost/Webframework/CI/index.php/api/insert";
				$form_data = array('nim' => $this->input->post ('nim'), 'nama' => $this->input->post('nama'));
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response=curl_exec($client);
				curl_close($client);
				echo $response; 
		}
		if ($data_action=="fetch_all") {
				$api_url = "http://localhost/Webframework/CI/index.php/api";
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response=curl_exec($client);
				curl_close($client);
				$result=json_decode($response);
				$output='';
				if (count($result)>0) {
					foreach ($result as $row) {
						$output .='
					<tr>
					<td>'.$row->nim.'</td>
					<td>'.$row->nama.'</td>
					<td><button type="button" name="edit" class="btn btn-warning edit" 	id="'.$row->nim.'"><i class="material-icons"
					style="font-size:15px">edit</i></button></td>
					<td><button type="button" name="delete" class="btn btn-danger delete" id="'.$row->nim.'"><i class="material-icons"
					style="font-size:15px">delete</i></button></td>
					</tr>
					';
					}
				} else {
					$output .='
					<tr>
					<td colspan="4" align:"center">No Data Found</td>
					</tr>
					';
				}
				echo $output;

			}

			}
		}
	}

?>