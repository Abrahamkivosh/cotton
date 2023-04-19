<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/
_admin();
$ui->assign('_title', $_L['Network'].' - '. $config['CompanyName']);
$ui->assign('_system_menu', 'network');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);

switch ($action) {
    case 'pool':
		$routers = _get('routers');
		$d = ORM::for_table('tbl_pool')->where('routers', $routers)->find_many();
		$ui->assign('d',$d);
		
        $ui->display('autoload-pool.tpl');
        break;
    case 'check_phone':
        $phone1 = _get('phone1');
        $phone2 = _get('phone2');

        if($phone1==$phone2){

        }else{
            echo "<b color='red'>Phone numbers doesn't match </b>";
        }
        break;
		
    case 'server':
		$d = ORM::for_table('tbl_routers')->find_many();
		$ui->assign('d',$d);
		
        $ui->display('autoload-server.tpl');
        break;
    case 'subvillage':
        $village_id=_get('village_id');
		$d = ORM::for_table('tbl_sub_villages')->where('village_id',$village_id)->find_many();
		$ui->assign('d',$d);
        $ui->display('autoload-subvillage.tpl');
        break;

   case 'maps_search':
    ?>
     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places"></script>
       
<script>
function initialize() {

var options = {
 types: ['(cities)'],
 componentRestrictions: {country: "et"}
};

var input = document.getElementById('searchTextField');
new google.maps.places.Autocomplete(input, options);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php
       break;        
		
    case 'plan':
		$server = _post('server');
		$jenis = _post('jenis');
        if($jenis=="IP"){
            $d = ORM::for_table('tbl_plans')->where('type', $jenis)->find_many();
        }else{
            $d = ORM::for_table('tbl_plans')->where('routers', $server)->where('type', $jenis)->find_many();
        }
	
		$ui->assign('d',$d);
		
        $ui->display('autoload.tpl');
        break;
    case 'live_data':
        //$router=_post('server');
        $router="OFFICE_ROUTER";
        $mikrotik = Router::_info("OFFICE_ROUTER");
        $interface=array();

            $client = new RouterOS\Client($mikrotik['ip_address'], $mikrotik['username'], $mikrotik['password']);

            $trequest2 = new RouterOS\Request('/interface print');
            $interr = $client->sendSync($trequest2);

            $i=0;
            foreach ($interr as $inter){
                $interface[$i]=$inter->getProperty('name');
                $i++;
            }


        $ui->assign('router', $router);
        $ui->assign('interface', $interface);
        $ui->display('autoload-interface.tpl');

        break;
		
    default:
        echo 'action not defined';
}