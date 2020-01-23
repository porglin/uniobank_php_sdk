<?php

namespace UnioBank;

class UnioBank{

	private $IntegrationType;
	private $IntegrationKey;

	private $PrivateKey;

	private $Environment;

	private $LinkBase;

	public function Configure($ArrayConfig){
		
		$this->setIntegrationType($ArrayConfig['IntegrationType']);
		$this->setIntegrationKey($ArrayConfig['IntegrationKey']);
		$this->setPrivateKey($ArrayConfig["PrivateKey"]);
		$this->setEnvironment($ArrayConfig['Environment']);

		if($this->getEnvironment() == 1){

			$this->setLinkBase("https://api.uniobank.com.br/");

		}else{

			// $this->setLinkBase("https://api.sandbox.uniobank.com.br/");
			$this->setLinkBase("http://localhost/UnioBankAPI/");

		}

		$Link = $this->getLinkBase() . "configure/validate/";

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $Link);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array(

			"IntegrationType" 	=> $this->getIntegrationType(),
			"IntegrationKey" 	=> $this->getIntegrationKey(),
			"PrivateKey" 		=> $this->getPrivateKey(),
			"Environment" 		=> $this->getEnvironment()

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

	public function getIntegrationType(){
		return $this->IntegrationType;
	}

	public function setIntegrationType($IntegrationType){
		$this->IntegrationType = $IntegrationType;
	}

	public function getIntegrationKey(){
		return $this->IntegrationKey;
	}

	public function setIntegrationKey($IntegrationKey){
		$this->IntegrationKey = $IntegrationKey;
	}

	public function getPrivateKey(){
		return $this->PrivateKey;
	}

	public function setPrivateKey($PrivateKey){
		$this->PrivateKey = $PrivateKey;
	}

	public function getEnvironment(){
		return $this->Environment;
	}

	public function setEnvironment($Environment){
		$this->Environment = $Environment;
	}

	public function getLinkBase(){
		return $this->LinkBase;
	}

	public function setLinkBase($LinkBase){
		$this->LinkBase = $LinkBase;
	}

}