<?php

require '../vendor/autoload.php';

use UnioBank\{UnioBank, Marketplace};

// $UnioBank = new UnioBank;
// $UnioBank->Configure(array(

// 	"IntegrationType" => 2,
// 	"IntegrationKey" => "e5805e21b96e7f4181c35ddd9bc6120c",
// 	"PrivateKey" => "23FDE-DFSDW-234DF-OEF78",
// 	"Environment" => 2

// ));

// var_dump($UnioBank);

$UnioBank = new Marketplace(array(

	"IntegrationType" => 2,
	"IntegrationKey" => "e5805e21b96e7f4181c35ddd9bc6120c",
	"PrivateKey" => "23FDE-DFSDW-234DF-OEF78",
	"Environment" => 2

));
// $UnioBank->linkMarktplaceHolder("235689");

var_dump($UnioBank->getLinkMarketplaceHolderInfo("235689"));