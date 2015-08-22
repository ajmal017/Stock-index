<?php
 require("includes/functions.php"); 
  $symbol= ["XOM","CVX","RDS-A","PTR","TOT","SNP","COP","IMO","BP","E","STO","EC","SU","MRO","PBR","MDU", "HES","YPF","XEC",
 "MUR","DO","RIG","HERO","CKH","PBT","LYB","DOW","DD","NEU", "WLK", "MEOH",
 "GRA", "LXU", "HUN", "CE","POL", "EMN","VLO","PSX","MPC","HFC","PBF","TSO",
"DK","CVI","WNR","ALJ","APD","CF","RTK"];
    $day=["2","3","4","5","6","7","8","9"];
    $month=["0","1"];
    $year=["2004","2005"];
     $stock=lookup($year,$month,$day,$symbol);
       
           

?>
