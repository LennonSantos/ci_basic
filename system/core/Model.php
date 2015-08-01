<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}
}
// END Model Class

class MY_Model{
	protected $db;
    public $_tabela;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=test', 'root', '',
             array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            )
        );
    }
    
    public function insert( Array $dados) {
        $campos = implode(", ", array_keys($dados));
        $valores = "'".implode("','", array_values($dados))."'";            
        return $this->db->query("INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores})");
    }
    
    public function read( $where = NULL, $limit = null, $offset = null, $orderby = null) {
        $where = ($where != null ? "WHERE {$where}" : "");
        $limit = ($limit != null ? "LIMIT {$limit}" : "");
        $offset = ($offset != null ? "OFFSET {$offset}" : "");
        $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
        $q = $this->db->query("SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset}");
        $q->setFetchMode(PDO::FETCH_ASSOC);
        return $q->fetchAll();
    }
    
    public function update( Array $dados, $where) {
        $sql = "UPDATE tabela SET nome = 'novo nome' WHERE id = 1";
        foreach ($dados as $ind => $val) {
            $campos[] = "{$ind} = '{$val}'";
        }
    $campos = implode(", ", $campos);
    return $this->db->query("UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where} ");
    }
    
    public function delete( $where) {
        return $this->db->query("DELETE FROM `{$this->_tabela}` WHERE {$where}");
    }
}

/* End of file Model.php */
/* Location: ./system/core/Model.php */