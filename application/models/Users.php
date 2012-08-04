<?php
class Application_Model_Users
{

	protected $_name='users';
	function checkUnique($username)
	{
		$select = $this->_db->select()
		->from($this->_name,array('username'))
		->where('username=?',$username);
		$result = $this->getAdapter()->fetchOne($select);
		if($result){
			return true;
		}
		return false;
	}

}