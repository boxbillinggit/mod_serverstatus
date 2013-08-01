<?php

class Box_Mod_ServerStatus_Controller_Admin
{

    public function fetchNavigation()
    {
        return array(
            'subpages'=> array(
                array(
                    'location'  => 'system',
                    'label'     => 'Server Status',
                    'index'     => 1510,
                    'uri'       => 'serverstatus',
                    'class'     => '',
                ),
            ),
        );
    }

    public function install()
    {
        return false;
    }

    public function uninstall()
    {
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
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 
		  $json = curl_exec($curl);
		  curl_close($curl);
		return $json;	
	}
	
    public function get_index(Box_App $app)
    {
		$pdo = Box_Db::getPdo();
        $query="SELECT * FROM server_status";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
		$toArray = $stmt->fetchAll();
		
		foreach($toArray as $key => $name) {
			$results['host'] += array($name['name'] => $name['name']);	
		}
		print_r($results);
       
	    $results = array();
		return $app->render('mod_serverstatus_index', $results);

    }
	
	public function get_add(Box_App $app)
    {
		
	    $results = array("test");
		return $app->render('mod_serverstatus_add', $results);

    }
	
}