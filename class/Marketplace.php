<?php

namespace UnioBank;

class Marketplace extends UnioBank{

	private $Hash;	

	public function __construct($ConfigureArray){

		UnioBank::Configure($ConfigureArray);

	}

	public function linkMarktplaceHolder($IntegrationCode){

		$Link = UnioBank::getLinkBase() . "marketplace/linkholder/";

		$curl = curl_init();	

		curl_setopt($curl, CURLOPT_URL, $Link);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array(

			"LinkCode" => $IntegrationCode

		));

		$Return = curl_exec($curl);
		curl_close($curl);	

		$jsonDecode = json_decode($Return);

		if($jsonDecode->Error != ""){

			try{

	            throw new \Exception($jsonDecode->Error);

	        }catch(\Exception $e){
	        	
	        	print_r("UnioBank Error: " . $e->getMessage());

	        }
	        
	        exit;
			
		}else{

			return $jsonDecode->Success;

		}

	}

	public function getLinkMarketplaceHolderInfo($CodeLink){

		$Link = UnioBank::getLinkBase() . "marketplace/linkholder/info/";

		$curl = curl_init();	

		curl_setopt($curl, CURLOPT_URL, $Link);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array(

			"LinkCode" => $CodeLink

		));

		$Return = curl_exec($curl);
		curl_close($curl);	

		$jsonDecode = json_decode($Return);

		if($jsonDecode->Error != ""){

			try{

	            throw new \Exception($jsonDecode->Error);

	        }catch(\Exception $e){
	        	
	        	print_r("UnioBank Error: " . $e->getMessage());

	        }
	        
	        exit;
			
		}else{

			return $jsonDecode;

		}

	}

	public function unlinkMarketplaceHolder($IntegrationCode){

		$Link = UnioBank::getLinkBase() . "marketplace/unlinkholder/";

		$curl = curl_init();	

		curl_setopt($curl, CURLOPT_URL, $Link);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array(

			"LinkCode" => $CodeLink

		));

		$Return = curl_exec($curl);
		curl_close($curl);	

		$jsonDecode = json_decode($Return);

		if($jsonDecode->Error != ""){

			try{

	            throw new \Exception($jsonDecode->Error);

	        }catch(\Exception $e){
	        	
	        	print_r("UnioBank Error: " . $e->getMessage());

	        }
	        
	        exit;
			
		}else{

			return $jsonDecode;

		}

	}

}