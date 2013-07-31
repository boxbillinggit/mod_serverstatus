<?php
/**
 * Example BoxBilling module
 *
 * LICENSE
 *
 * This source file is subject to the license that is bundled
 * with this package in the file LICENSE.txt
 * It is also available through the world-wide-web at this URL:
 * http://www.boxbilling.com/LICENSE.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@boxbilling.com so we can send you a copy immediately.
 *
 * @copyright Copyright (c) 2010-2012 BoxBilling (http://www.boxbilling.com)
 * @license   http://www.boxbilling.com/LICENSE.txt
 * @version   $Id$
 */

/**
 * This file connects BoxBilling amin area interface and API
 */
class Box_Mod_ServerStatus_Controller_Admin
{

    public function fetchNavigation()
    {
        return array(
            'subpages'=> array(
                array(
                    'location'  => 'system', // place this module in extensions group
                    'label'     => 'Server Status',
                    'index'     => 1510,
                    'uri'       => 'serverstatus',
                    'class'     => '',
                ),
            ),
        );
    }

    /**
     * Method to install module
     *
     * @return bool
     */
    public function install()
    {
        //throw new Box_Exception("Instalacja się nie udała", array(), 123);
        return false;
    }

    /**
     * Method to uninstall module
     * 
     * @return bool
     */
    public function uninstall()
    {
		$pdo = Box_Db::getPdo();
        $query="DROP TABLE server_status";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return true;
    }

    /**
     * Methods maps admin areas urls to corresponding methods
     * Always use your module prefix to avoid conflicts with other modules
     * in future
     *
     *
     * @example $app->get('/example/test',      'get_test', null, get_class($this)); // calls get_test method on this class
     * @example $app->get('/example/:id',        'get_index', array('id'=>'[0-9]+'), get_class($this));
     * @param Box_App $app
     */
    public function register(Box_App &$app)
    {
        $app->get('/serverstatus',             'get_index', array(), get_class($this));
		$app->get('/serverstatus/add',         'get_index', array(), get_class($this));
    }
		
	public function __curl($url) {
		  $curl = curl_init();
		  curl_setopt($curl, CURLOPT_URL, $url);
		 // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 
		  $json = curl_exec($curl);
		  curl_close($curl);
		return $json;	
	}
	
    public function get_index(Box_App $app)
    {
       
	    $results = array();
		return $app->render('mod_serverstatus_index', $results);

    }
	
	public function get_add(Box_App $app)
    {
       
	    $results = array();
		return $app->render('mod_serverstatus_add', $results);

    }
	
}