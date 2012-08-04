<?php
class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract {

	protected $_name = 'users'; //this is the database tablename (Optional, automatically created by Zend_Tool)
	protected $_primary = 'id'; //this is the primary key of the table (Optional, but a good idea)

}
