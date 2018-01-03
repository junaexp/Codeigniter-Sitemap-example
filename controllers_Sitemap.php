<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	############################################################################################################
	## Sitemap -- view/user/inc/sitemap, config/routes
	############################################################################################################
	public function index()
	{
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		// static_page
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		$arr_static_page = array(
			base_url(),
			base_url().'study',
			base_url().'library',
			base_url().'platform',
			base_url().'work',
		);

		//////////////////////////////////////////////////////////////////////////////////////////////////////
		// content_page (Mysql Query Example)
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		$url_arrays = array('study', 'library', 'platform', 'work');

		foreach($url_arrays as $url_arrays)
		{
			$result_arr = $this->db->query(" [YOUR QUERY] ")->result_array();
			foreach ($result_arr as $result_arr)
			{
				//Make Url
				if($url_arrays == 'study') {
					$study_urls[] = base_url().$url_arrays.'/read/'.$result_arr['idx'];
				}

				if($url_arrays == 'library')
				{
					$library_urls[] = base_url().$url_arrays.'/read/'.$result_arr['idx'];
				}

				if($url_arrays == 'platform')
				{
					$platform_urls[] = base_url().$url_arrays.'/read/'.$result_arr['idx'];
				}

				if($url_arrays == 'work')
				{
					$work_urls[] = base_url().$url_arrays.'/read/'.$result_arr['idx'];
				}
			}
		}

		//////////////////////////////////////////////////////////////////////////////////////////////////////
		// empty to NULL Array (need_fix)
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		if(empty($study_urls)) { $study_urls = array(); }
		if(empty($library_urls)) { $library_urls = array(); }
		if(empty($platform_urls)) { $platform_urls = array(); }
		if(empty($work_urls)) { $work_urls = array(); }

		//////////////////////////////////////////////////////////////////////////////////////////////////////
		// view
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		$data['list'] = array_merge($arr_static_page, $study_urls, $library_urls, $platform_urls, $work_urls);

        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('user/inc/sitemap', $data);
	}
}
