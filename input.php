<?php
	 require("includes/functions.php");
	 $index=($_POST["stocks"]);
	 $array=($_POST["symbols"]);
	 //year globals
	 $fromYear=($_POST["fromyear"]);
	 $toYear=($_POST["toyear"]);

	 //month globals
	 $fromMonth=($_POST["frommonth"]);
	 $toMonth=($_POST["tomonth"]);
	 //day globals
	 $fromDay=($_POST["fromday"]);
	 $toDay=($_POST["today"]);


	//place user input into an array
	if($array !=NULL)
	{
		 if(strpos($array,' ') !==FALSE && strpos($array,',') !==FALSE)
		 {
		 	echo("<h3>Please properly format stock tickers</h3>");
		 	break;
		 }

		 else if(strpos($array,' ') !==FALSE)
		 {
		 	$symbol=explode(' ', $array);

		 	
		 }


		 else if(strpos($array,',') !==FALSE)
		 {
		 	$symbol=explode(',', $array);
		 }

		 else if(((count($array))==1) !==FALSE)
		 {
		 	$symbol=array($array);
		 }



	}
	else
	{
	     $symbol=explode(' ', $index);
	}



	//year

	$years=$fromYear." ".$toYear;
	$year=explode(' ', $years);

	//month

	$months=($fromMonth-1)." ".($toMonth-1);
	$month=explode(' ', $months);

	//days

	$days=$fromDay." ".$toDay;
	$day=explode(' ', $days);

	$stock=lookup($year,$month,$day,$symbol);

	render ("charts.php", ["notThroughout"=>$stock["notThroughout"],"notExist"=>$stock["notExist"],"bb" => $stock["bb"], "stockTwelveTwentySix" =>$stock ["stockTwelveTwentySix"],"stockTwelve" =>$stock["stockTwelve"], "twentyDay" =>$stock["twentyDay"],"stockIndex" =>$stock["stockIndex"]]);
	      
	           

?>
