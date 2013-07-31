<?php

class Box_Mod_ServerStatus_Service
{
    /**
     * Method to install module. In most cases you will provide your own
     * database table or tables to store extension related data.
     * 
     * If your extension is not very complicated then extension_meta 
     * database table might be enough.
     *
     * @return bool
     * @throws Box_Exception
     */
    public function install()
    {
        // execute sql script if needed
        $pdo = Box_Db::getPdo();
        $query="SELECT NOW()";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
		
		$pdo = Box_Db::getPdo();
        $query="CREATE TABLE IF NOT EXISTS `server_status` (
				  `id` int(11) NOT NULL,
				  `name` varchar(255) NOT NULL,
				  `host` varchar(255) NOT NULL,
				  `www` int(11) NOT NULL DEFAULT '0',
				  `mail` int(11) NOT NULL DEFAULT '0',
				  `ftp` int(11) NOT NULL DEFAULT '0'
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
		
        //throw new Box_Exception("Throw exception to terminate module installation process with a message", array(), 123);
        return true;
    }
    
    /**
     * Method to uninstall module.
     * 
     * @return bool
     * @throws Box_Exception
     */
    public function uninstall()
    {
        //throw new Box_Exception("Throw exception to terminate module uninstallation process with a message", array(), 124);
        return true;
    }
    
    /**
     * Method to update module. When you release new version to 
     * extensions.boxbilling.com then this method will be called
     * after new files are placed.
     * 
     * @param array $manifest - information about new module version
     * @return bool
     * @throws Box_Exception
     */
    public function update($manifest)
    {
        //throw new Box_Exception("Throw exception to terminate module update process with a message", array(), 125);
        return true;
    }
    
 	public function onAfterAdminActivateExtension() {
		/*$pdo = Box_Db::getPdo();
        $query="CREATE TABLE IF NOT EXISTS `server_status` (
				  `id` int(11) NOT NULL,
				  `name` varchar(255) NOT NULL,
				  `host` varchar(255) NOT NULL,
				  `www` int(11) NOT NULL DEFAULT '0',
				  `mail` int(11) NOT NULL DEFAULT '0',
				  `ftp` int(11) NOT NULL DEFAULT '0'
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();*/
	}
 
}