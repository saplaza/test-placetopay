<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use SoapClient;
use App\PaymentReference;
use App\GeneratedResponse;
use DB;

class PseController extends Controller
{	
	public function index(){
        $getBankList = "";
		$getBankList = $this->getBankList();
        $error = "";
        if(is_null($getBankList)){
            $error = "No se pudo obtener la lista de Entidades Financieras, por favor intente más tarde";
        }


        return view('Pse.index')->with(['getBankList'=>$getBankList,'error'=>$error]); 
	}

    public function ListPaymentReference(){
        try {
            
            $respuestaGettrans = '';
            if (isset($_GET['returnpse'])) {
                $hashkey = sha1($this->seed().$this->tran_key(),false);

                $params = array(
                'auth' => array(
                    'login' => $this->login(),
                    'tranKey' => $hashkey,
                    'seed' => $this->seed(),
                    'additional' => ''
                    ),
                    'transactionID' => $_SESSION['transactionID']
                );
                $client = new SoapClient($this->url(),$params);
                $resulttransactionID = $client->__soapCall('getTransactionInformation', array($params));
                
                $respuestaGettrans = $resulttransactionID->getTransactionInformationResult->responseReasonText;
                $responseReasonCode = $resulttransactionID->getTransactionInformationResult->responseReasonCode;
                $this->UpdateState($_SESSION['geneRespID'],$respuestaGettrans,$responseReasonCode,$resulttransactionID->getTransactionInformationResult->returnCode);
            }
            $data = DB::table('payment_references')
                ->join('generated_responses','generated_responses.payment_reference_id', '=', 'payment_references.id')
                ->orderBy('payment_references.id', 'DESC')
                ->get();
        } catch (Exception $e) {
            \Log::debug($e->getMessage());
        }
      return view('Pse.list_payment_reference')->with(['list_payment_references'=>$data, 'respuestaGettrans'=> $respuestaGettrans]); 
    }

    public function UpdateState($id,$responseReasonText,$responseReasonCode,$returnCode)
    {
        $generateResponse = GeneratedResponse::find($id);
        $generateResponse->response_reason_text = $responseReasonText;
        $generateResponse->response_reason_code = $responseReasonCode;
        $generateResponse->status = $returnCode;
        $generateResponse->save();
    }

    private function getBankList(){
        $hashkey = sha1($this->seed().$this->tran_key(),false);

        try {
        	$getListBankCache = \Cache::get('getListBankCache');
        	if (is_null($getListBankCache)) {
        		$params = array(
	                'auth' => array(
	                    'login' => $this->login(),
	                    'tranKey' => $hashkey,
	                    'seed' => $this->seed(),
	                    'additional' => ''
	                )
	            );
		    	$client = new SoapClient($this->url(),$params);
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


    public function createTransaction(Request $request){
        $info = $request->all();
        $reference = 'PSETEST1036';
        $description = 'Pago de pruebas';
        $total_amount = '100000';
        $country = 'COP';

        $devolution_base = '0';
        $tip_amount = '0';
        $tax_amount = '0';

        $infoadicional = array(
            'reference' => $reference,
            'description' => $description,
            'total_amount' => $total_amount,
            'country' => $country,
            'ip_address' => $_SERVER["REMOTE_ADDR"],
            'user_agent' => "",
            'devolution_base' => $devolution_base,
            'tip_amount' => $tip_amount,
            'tax_amount' => $tax_amount
            );
        $todaInfo = array_merge($info,$infoadicional);
        
        $resul = PaymentReference::create($todaInfo);

        if ($resul->id > 0) {
            $hashkey = sha1($this->seed().$this->tran_key(),false);

            $params = array(
                'auth' => array(
                    'login' => $this->login(),
                    'tranKey' => $hashkey,
                    'seed' => $this->seed(),
                    'additional' => ''
                ),
                'transaction' => array(
                    'bankCode' => $todaInfo['bank'],
                    'bankInterface' => $todaInfo['type_pay'],
                    'returnURL' => url('/').'/list-payment-reference?returnpse=1',
                    'reference' => $todaInfo['reference'],
                    'description' => $todaInfo['description'],
                    'language' => 'ES',
                    'currency' => 'COP',
                    'totalAmount' => (double) $todaInfo['total_amount'],
                    'taxAmount' => (double) $todaInfo['tax_amount'],
                    'devolutionBase' => (double) $todaInfo['devolution_base'],
                    'tipAmount' => (double) $todaInfo['tip_amount'],
                    'payer' => array(
                        'document' => $todaInfo['document'],
                        'documentType' => $todaInfo['document_type'],
                        'firstName' => $todaInfo['first_name'],
                        'lastName' => $todaInfo['last_name'],
                        'company' => $todaInfo['company'],
                        'emailAddress' => $todaInfo['email_address'],
                        'address' => $todaInfo['address'],
                        'city' => $todaInfo['city'],
                        'province' => $todaInfo['province'],
                        'country' => $todaInfo['country'],
                        'phone' => $todaInfo['phone'],
                        'mobile' => $todaInfo['mobile']
                    ),
                    'shipping' => array(
                        'document' => $todaInfo['document'],
                        'documentType' => $todaInfo['document_type'],
                        'firstName' => $todaInfo['first_name'],
                        'lastName' => $todaInfo['last_name'],
                        'company' => $todaInfo['company'],
                        'emailAddress' => $todaInfo['email_address'],
                        'address' => $todaInfo['address'],
                        'city' => $todaInfo['city'],
                        'province' => $todaInfo['province'],
                        'country' => $todaInfo['country'],
                        'phone' => $todaInfo['phone'],
                        'mobile' => $todaInfo['mobile']
                    ),
                    'ipAddress' => $todaInfo['ip_address'],
                    'userAgent' => '',
                    'additionalData' => ''
                )
            );
                $client = new SoapClient($this->url(),$params);
                $resultado_create_transan = $client->__soapCall('createTransaction', array($params));
                //dd($resul->id);
            if ($resultado_create_transan) {
                $resul_pay = array(
                'payment_reference_id' => $resul->id,
                'status' => $resultado_create_transan->createTransactionResult->returnCode,
                'trazability_code' => $resultado_create_transan->createTransactionResult->trazabilityCode,
                'transaction_cycle' => $resultado_create_transan->createTransactionResult->transactionCycle,
                'transaction_id' => $resultado_create_transan->createTransactionResult->transactionID,
                'session_id' => $resultado_create_transan->createTransactionResult->sessionID,
                'bank_currency' => $resultado_create_transan->createTransactionResult->bankCurrency,
                'bank_factor' => $resultado_create_transan->createTransactionResult->bankFactor,
                'response_code' => $resultado_create_transan->createTransactionResult->responseCode,
                'response_reason_code' => $resultado_create_transan->createTransactionResult->responseReasonCode,
                'response_reason_text' => $resultado_create_transan->createTransactionResult->responseReasonText
                );

                $resul_payCreata = GeneratedResponse::create($resul_pay); 

                if ($resultado_create_transan->createTransactionResult->returnCode == 'SUCCESS') {
                   $_SESSION['geneRespID'] = $resul_payCreata->id;
                   $_SESSION['transactionID'] = $resultado_create_transan->createTransactionResult->transactionID;
                   return redirect($resultado_create_transan->createTransactionResult->bankURL);
                }      
            }    
        }

    }
}
