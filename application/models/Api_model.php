<?php
class Api_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

   public function get_employee_workhour($emp_id, $start_date, $end_date){
	   try{
			$php_required = '5.5';
			$this->load->helper('url');

			$result = null;
			$status_code = null;
			$content_type = null;

			$uri = $this->config->item('hrm').'/Api/count_employee_workhours';
			$client = new GuzzleHttp\Client();
			$res = $client->post($uri, [
				'form_params' => [
					'emp_id' => $emp_id,
					'start_date' => $start_date,
					'end_date' => $end_date,
					'X-API-KEY' => 'iminlove'
				],
				'auth' => ['sysQA', '5081d27aec3340b7ab2c52635c69ff130af1a27a', 'digest'],
				 'headers' => [
					'User-Agent' => 'testing/1.0',
					'Accept'     => 'application/json',
					'realm'      => 'REST API'
				],
				['debug' => true]
			]);
			
			$return['status_code'] = $res->getStatusCode();
			$return['data'] = json_decode((string) $res->getBody());
			
			return $return;
		}catch(GuzzleHttp\Exception\ClientException $e){
			
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			$return['status_code'] = $response->getStatusCode();
			$return['msg'] = $responseBodyAsString;
			return $return;
		}
   }
   
   public function get_holiday_list(){
	   try{
			$php_required = '5.5';
			$this->load->helper('url');

			$result = null;
			$status_code = null;
			$content_type = null;

			$uri = $this->config->item('hrm').'/Api/holidays?X-API-KEY=iminlove';
			$client = new GuzzleHttp\Client();

			$res = $client->request('GET', $uri, [
				'auth' => ['sysQA', '5081d27aec3340b7ab2c52635c69ff130af1a27a', 'digest'],
			]);
			
			$return['status_code'] = $res->getStatusCode();
			$return['data'] = json_decode((string) $res->getBody());
			
			return $return;
		}catch(GuzzleHttp\Exception\ClientException $e){
			
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			$return['status_code'] = $response->getStatusCode();
			$return['msg'] = $responseBodyAsString;
			return $return;
		}
   }
   
   public function get_milist(){
	   try{
			$php_required = '5.5';
			$this->load->helper('url');
			$this->config->load('qa_tracker_config');
			
			$result = null;
			$status_code = null;
			$content_type = null;

			$uri = $this->config->item('hrm').'/Api/milist?X-API-KEY=iminlove';
			$client = new GuzzleHttp\Client();

			$res = $client->request('GET', $uri, [
				'client' => $this->config->load('client'),
				'auth' => ['sysQA', '5081d27aec3340b7ab2c52635c69ff130af1a27a', 'digest'],
			]);
			
			$return['status_code'] = $res->getStatusCode();
			$return['data'] = json_decode((string) $res->getBody());
			
			return $return;
		}catch(GuzzleHttp\Exception\ClientException $e){
			
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			$return['status_code'] = $response->getStatusCode();
			$return['msg'] = $responseBodyAsString;
			return $return;
		}
   }
}