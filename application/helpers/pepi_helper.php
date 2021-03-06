<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Pepi Custom Helpers
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author      ExpressionEngine Dev Team
 * @link        http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

/**
 * convert unix timestampt do date
 *
 * Returns date string base on site_date_format config
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('site_show_date_format'))
{
    function site_show_date_format($unix_ts = 0)
    {
		$unix_ts = strtotime($unix_ts);
        if ($unix_ts > 0) {
            $CI =& get_instance();

            $site_date_format = $CI->config->item('site_show_date_format');
            if (!empty($site_date_format)) {
                $date_format = $site_date_format;
            } else {
                $date_format = 'm/d/Y';
            }
            $date = date($date_format,$unix_ts);
            return $date;
        }
        return false;
    }
}

if ( ! function_exists('db_date_format'))
{
    function db_date_format($unix_ts = 0)
    {
        if ($unix_ts > 0) {
            $CI =& get_instance();
			
            $site_date_format = $CI->config->item('db_date_format');
            if (!empty($site_date_format)) {
                $date_format = $site_date_format;
            } else {
                $date_format = 'Y-m-d H:i:s';
            }
            $date = date($date_format,strtotime($unix_ts));
            return $date;
        }
        return false;
    }
}
if ( ! function_exists('db_date_format_custom_time'))
{
    function db_date_format_custom_time($unix_ts = 0, $time='')
    {
        if ($unix_ts > 0 && !empty($time)) {
            $CI =& get_instance();
			
            $site_date_format = $CI->config->item('db_date_format');
            if (!empty($site_date_format)) {
                $date_format = $site_date_format;
            } else {
                $date_format = 'Y-m-d '.$time;
            }
            $date = date($date_format,strtotime($unix_ts));
            return $date;
        }
        return false;
    }
}

if ( ! function_exists('return_json'))
{
    function return_json($data = array())
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}

if ( ! function_exists('is_ajax'))
{
    function is_ajax()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }
}

if ( ! function_exists('error_log'))
{
    function error_log($msg= '')
    {
		write_file('./errorapp.log', date('Y-m-d H:m:s').' '.session_id().' Message : '.print_r($msg, true)."\n", "a+");
		return true;
    }
}

if ( ! function_exists('api_log'))
{
    function api_log($status = 0, $msg= '', $url='')
    {
		date_default_timezone_set('Asia/Jakarta');
		write_file('./api.log', date('Y-m-d H:i:s').' '.session_id().' Status : '.$status."\n", "a+");
		write_file('./api.log', date('Y-m-d H:i:s').' '.session_id().' Message : '.print_r($msg, true)."\n", "a+");
		write_file('./api.log', date('Y-m-d H:i:s').' '.session_id().' URL/ID : '.$url."\n", "a+");
		return true;
    }
}