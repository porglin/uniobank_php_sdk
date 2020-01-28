<?php

namespace UnioBank;

class Transaction extends UnioBank{

	private $Code;
	private $Status;
	private $Hash;

	private $TransactionType;

	private $Origin;

	private $Seller;
	private $Buyer;

	private $Itens = array();
	private $Value;

	private $PaymentMethod;
	private $PaymentExtra;

	private $Split;
	private $SplitExtra;

	private $Environment;

	private $Result;
	private $Error;

	public function __construct($ConfigureArray){

		UnioBank::Configure($ConfigureArray);

		$this->setEnvironment($ConfigureArray['Environment']);

	}

	public function InitTransaction(array $Config){

		$this->setOrigin(array(
			"reference" => $Config['origin'],
			"type" => $Config['originType']
		));
		$this->setBuyer($Config['buyer']);
		$this->setSeller($Config['seller']);
		
	}

	public function SplitConfigure(array $SpliterConfig){

		if(isset($SpliterConfig['type'])){

			$this->setSplit($SpliterConfig['type']);

			if($SpliterConfig['type'] == 1){



			}else if($SpliterConfig['type'] == 2){

				$this->setSplitExtra($SpliterConfig['spliters']);

			}else{

				$this->setError("Split Type is Invalid");

			}

		}else{

			$this->setError("Split Type is Required");

		}

	}

	public function DefineItem(array $Item){

		$this->Itens[] = $Item;

		$this->setValue(0);
		
		foreach ($this->getItens() as $Row) {

			$this->setValue($this->getValue() + ($Row['value'] * $Row['quantity']));

		}

	}

	public function PaymentConfigure(array $DataPayment){

		$this->setPaymentMethod($DataPayment['method']);
		$this->setPaymentExtra($DataPayment['extraInfo']);

	}

	public function DoPayment(){

		$ArraySend = array(

			"environment" => $this->getEnvironment(),
			"origin" => $this->getOrigin(),
			"seller" => $this->getSeller(),
			"buyer" => $this->getBuyer(),
			"total" => $this->getValue(),
			"itens" => $this->getItens(),
			"spliterType" => $this->getSplit(),
			"spliterExtra" => $this->getSplitExtra(),
			"paymentMethod" => $this->getPaymentMethod(),
			"paymentExtra" => $this->getPaymentExtra()
 
		);

		// echo json_encode($ArraySend);

		$Link = UnioBank::getLinkBase() . "transaction/create/";

		$curl = curl_init();	

		curl_setopt($curl, CURLOPT_URL, $Link);
		curl_setopt($curl, CURLOPT_POST, true);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($ArraySend));

		$Return = curl_exec($curl);
		curl_close($curl);	

		$jsonDecode = json_decode($Return);

		var_dump($jsonDecode);

	}

	public function getCode(){
		return $this->Code;
	}

	public function setCode($Code){
		$this->Code = $Code;
	}

	public function getStatus(){
		return $this->Status;
	}

	public function setStatus($Status){
		$this->Status = $Status;
	}

	public function getHash(){
		return $this->Hash;
	}

	public function setHash($Hash){
		$this->Hash = $Hash;
	}

	public function getTransactionType(){
		return $this->TransactionType;
	}

	public function setTransactionType($TransactionType){
		$this->TransactionType = $TransactionType;
	}

	public function getOrigin(){
		return $this->Origin;
	}

	public function setOrigin($Origin){
		$this->Origin = $Origin;
	}

	public function getSeller(){
		return $this->Seller;
	}

	public function setSeller($Seller){
		$this->Seller = $Seller;
	}

	public function getBuyer(){
		return $this->Buyer;
	}

	public function setBuyer($Buyer){
		$this->Buyer = $Buyer;
	}

	public function getItens(){
		return $this->Itens;
	}

	public function setItens($Itens){
		$this->Itens = $Itens;
	}

	public function getValue(){
		return $this->Value;
	}

	public function setValue($Value){
		$this->Value = $Value;
	}

	public function getPaymentMethod(){
		return $this->PaymentMethod;
	}

	public function setPaymentMethod($PaymentMethod){
		$this->PaymentMethod = $PaymentMethod;
	}

	public function getPaymentExtra(){
		return $this->PaymentExtra;
	}

	public function setPaymentExtra($PaymentExtra){
		$this->PaymentExtra = $PaymentExtra;
	}

	public function getSplit(){
		return $this->Split;
	}

	public function setSplit($Split){
		$this->Split = $Split;
	}

	public function getSplitExtra(){
		return $this->SplitExtra;
	}

	public function setSplitExtra($SplitExtra){
		$this->SplitExtra = $SplitExtra;
	}

	public function getEnvironment(){
		return $this->Environment;
	}

	public function setEnvironment($Environment){
		$this->Environment = $Environment;
	}

	public function getResult(){
		return $this->Result;
	}

	public function setResult($Result){
		$this->Result = $Result;
	}

	public function getError(){
		return $this->Error;
	}

	public function setError($Error){
		$this->Error = $Error;
	}

}