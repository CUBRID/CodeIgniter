<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * NOTICE OF LICENSE
 * 
 * Licensed under the Open Software License version 3.0
 * 
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 2.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CUBRID Utility Class
 *
 * @category	Database
 * @author		Esen Sagynov
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_cubrid_utility extends CI_DB_utility {

    /**
     * List databases
     *
     * @access	public
     * @return	bool
     */
    function list_databases()
    {
        // Is there a cached result?
        if (isset($this->data_cache['db_names']))
        {
            return $this->data_cache['db_names'];
        }

        $query = $this->db->query('SELECT LIST_DBS()');
        $dbs = array();
        if ($query->num_rows() > 0)
        {
            // CUBRID returns a list of databases in one row separated
            // by spaces.
            $dbs = explode(' ', current(current($query->result_array())));
        }

        $this->data_cache['db_names'] = $dbs;
        return $this->data_cache['db_names'];
    }

	// --------------------------------------------------------------------

	/**
	 * Optimize table query
	 *
	 * Generates a platform-specific query so that a table can be optimized
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 * @link 	http://www.cubrid.org/manual/841/en/Optimize%20Database
	 */
	function _optimize_table($table)
	{
		// No SQL based support in CUBRID as of version 8.4.1. Database or
		// table optimization can be performed using CUBRID Manager
		// database administration tool. See the link above for more info.
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Repair table query
	 *
	 * Generates a platform-specific query so that a table can be repaired
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 * @link 	http://www.cubrid.org/manual/840/en/Checking%20Database%20Consistency
	 */
	function _repair_table($table)
	{
		// Not supported in CUBRID as of version 8.4.1. Database or
		// table consistency can be checked using CUBRID Manager
		// database administration tool. See the link above for more info.
		return FALSE;
	}

	// --------------------------------------------------------------------
	/**
	 * CUBRID Export
	 *
	 * @access	private
	 * @param	array	Preferences
	 * @return	mixed
	 */
	function _backup($params = array())
	{
		// No SQL based support in CUBRID as of version 8.4.1. Database or
		// table backup can be performed using CUBRID Manager
		// database administration tool.
		return $this->db->display_error('db_unsuported_feature');
	}
}

/* End of file cubrid_utility.php */
/* Location: ./system/database/drivers/cubrid/cubrid_utility.php */