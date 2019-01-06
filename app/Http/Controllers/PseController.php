<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use App\PaymentReference;
use App\GeneratedResponse;

class PseController extends Controller
{	
	public function index(){
        $getBankList = "";
		$getBankList = $this->getBankList();
        if(is_null($getBankList)){
            dd($getBankList);
        }
        return view('Pse.index')->with(['getBankList'=>$getBankList]); 
	}


    private function getBankList()
    {
    	$login = config("app.PSE.login");
        $seed  = date( 'c' );
        $tranKey = config("app.PSE.tran_key");
        $hashkey = sha1($seed.$tranKey,false);
        $url_test = config("app.PSE.url");

        try {
        	\Cache::forget('getListBankCache');
        	$getListBankCache = \Cache::get('getListBankCache');
        	if (is_null($getListBankCache)) {
        		\Cache::forget('getListBankCache');
        		$params = array(
	                'auth' => array(
	                    'login' => $login,
	                    'tranKey' => $hashkey,
	                    'seed' => $seed,
	                    'additional' => ''
	                )
	            );
		    	$client = new SoapClient($url_test,$params);
		    	$getBankListArray = $client->__soapCall('getBankList', array($params));
		    	$writegetListBankCache = \Cache::put('getListBankCache',$getBankListArray, 1440);
		    	$getListBankCache = \Cache::get('getListBankCache');
        	}else{
        		$getListBankCache = \Cache::get('getListBankCache');
        	}
	        

        }catch(SoapFault $fault) {
        	echo '<br>'.$fault;
    	}

    	return $getListBankCache->getBankListResult;
    }
}
