<?php
// This script and data application were generated by AppGini 5.50
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/duck_mrs2016.php");
	include("$currDir/duck_mrs2016_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('duck_mrs2016');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "duck_mrs2016";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`duck_mrs2016`.`duck_id`" => "duck_id",
		"IF(    CHAR_LENGTH(`trans_mrs20161`.`transaction_id`), CONCAT_WS('',   `trans_mrs20161`.`transaction_id`), '') /* Transactie nr */" => "transaction_id",
		"`duck_mrs2016`.`creationdate`" => "creationdate"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`duck_mrs2016`.`duck_id`',
		2 => 2,
		3 => 3
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`duck_mrs2016`.`duck_id`" => "duck_id",
		"IF(    CHAR_LENGTH(`trans_mrs20161`.`transaction_id`), CONCAT_WS('',   `trans_mrs20161`.`transaction_id`), '') /* Transactie nr */" => "transaction_id",
		"`duck_mrs2016`.`creationdate`" => "creationdate"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`duck_mrs2016`.`duck_id`" => "Badeend nr",
		"IF(    CHAR_LENGTH(`trans_mrs20161`.`transaction_id`), CONCAT_WS('',   `trans_mrs20161`.`transaction_id`), '') /* Transactie nr */" => "Transactie nr",
		"`duck_mrs2016`.`creationdate`" => "Creationdate"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`duck_mrs2016`.`duck_id`" => "duck_id",
		"IF(    CHAR_LENGTH(`trans_mrs20161`.`transaction_id`), CONCAT_WS('',   `trans_mrs20161`.`transaction_id`), '') /* Transactie nr */" => "transaction_id",
		"`duck_mrs2016`.`creationdate`" => "creationdate"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'transaction_id' => 'Transactie nr');

	$x->QueryFrom="`duck_mrs2016` LEFT JOIN `trans_mrs2016` as trans_mrs20161 ON `trans_mrs20161`.`transaction_id`=`duck_mrs2016`.`transaction_id` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "duck_mrs2016_view.php";
	$x->RedirectAfterInsert = "duck_mrs2016_view.php?SelectedID=#ID#";
	$x->TableTitle = "Badeenden 2016";
	$x->TableIcon = "resources/table_icons/anchor.png";
	$x->PrimaryKey = "`duck_mrs2016`.`duck_id`";

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Badeend nr", "Transactie nr", "Creationdate");
	$x->ColFieldName = array('duck_id', 'transaction_id', 'creationdate');
	$x->ColNumber  = array(1, 2, 3);

	$x->Template = 'templates/duck_mrs2016_templateTV.html';
	$x->SelectedTemplate = 'templates/duck_mrs2016_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `duck_mrs2016`.`duck_id`=membership_userrecords.pkValue and membership_userrecords.tableName='duck_mrs2016' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `duck_mrs2016`.`duck_id`=membership_userrecords.pkValue and membership_userrecords.tableName='duck_mrs2016' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`duck_mrs2016`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: duck_mrs2016_init
	$render=TRUE;
	if(function_exists('duck_mrs2016_init')){
		$args=array();
		$render=duck_mrs2016_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: duck_mrs2016_header
	$headerCode='';
	if(function_exists('duck_mrs2016_header')){
		$args=array();
		$headerCode=duck_mrs2016_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: duck_mrs2016_footer
	$footerCode='';
	if(function_exists('duck_mrs2016_footer')){
		$args=array();
		$footerCode=duck_mrs2016_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>