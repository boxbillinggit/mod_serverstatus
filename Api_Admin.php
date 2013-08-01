<?php
/**
 * Example module API
 * This api can be access only for admins
 */
class Box_Mod_ServerStatus_Api_Admin extends Api_Abstract
{

	public function add($data) {

		$data = array();
		
		print_r($_POST);
		
		/*$pdo = Box_Db::getPdo();
        $query="UPDATE `extension_meta` SET `meta_value`='{$return}' WHERE extension='mod_autoticket'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
		
		return $return;*/

	}
	
}