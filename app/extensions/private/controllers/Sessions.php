<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (http://sundi3yansyah.com)
 * @version     Watch in Latest Tag
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Sessions extends QA_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id',
                'ip_address',
                'timestamp',
                'data',
                ),
            );
		$this->_render('session/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request())
        {
            exit('No direct script access allowed');
        }
        else
        {
            $table = ''.DBPREFIX.'session';

            $primaryKey = 'id';

            $columns = array(
                array('db' => 'id', 'dt' => 'id'),
                array('db' => 'ip_address', 'dt' => 'ip_address'),
                array(
                    'db' => 'timestamp',
                    'dt' => 'timestamp',
                    'formatter' => function($str)
                    {
                        return dateHourIconPrivate(date('Y-m-d H:i:s', $str));
                    }
                ),
                array(
                    'db' => 'data',
                    'dt' => 'data',
                    'formatter' => function($str)
                    {
                        return '<textarea style="margin: 0px;height: 150px;width: 350px;">'
                        .preg_replace("/[s:]+[0-9]+[:]/", '', preg_replace("/^.+\n/", "", str_replace(';', "\n", str_replace('|', ' : ', $str)))).
                        '</textarea>';
                    }
                ),
                array(
                    'db' => 'id',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete/' . $id) . '" class="btn btn-danger btn-xs">Delete</a>';
                    }
                ),
            );

            $sql_details = array(
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
                );

            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(Datatables::simple($_GET, $sql_details, $table, $primaryKey, $columns), JSON_PRETTY_PRINT));
        }
	}

    function delete($str = NULL)
    {
        if (isset($str))
        {
            $data = $this->_get($str);
            if (!empty($data))
            {
                $this->qa_model->delete('session', array('id' => $str));
                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
            }
            else
            {
                show_404();
                return FALSE;
            }
        }
        else
        {
            show_404();
            return FALSE;
        }
    }

    function _get($str)
    {
        $var = $this->qa_model->get('session', array('id' => $str));
        return ($var == FALSE)?array():$var;
    }
}