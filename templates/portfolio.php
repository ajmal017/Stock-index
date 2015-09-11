    <form action="input.php" method="POST">


    <!--Stock Symbol Selection-->
    <h4 class="text-info">Select Stocks:</h4>
    	<div class="form-group">
    		<input type="radio" name="stocks" id= "userstocks" value="" ><label for="symbols" id= "userstocks">User Supplied:</label><input type="text" placeholder="50 Symbol Limit" id="symbol" class="form-control"name="symbols"><br>(Separate symbols using either spaces or commas)
    	</div>
    		<input type="radio" id="energy" name="stocks" value="XOM CVX RDS-A PTR TOT SNP COP IMO BP E STO EC SU MRO PBR MDU HES YPF XEC MUR DO RIG HERO CKH PBT LYB DOW DD NEU WLK MEOH GRA LXU HUN CE POL EMN VLO PSX MPC HFC PBF TSO DK CVI WNR ALJ APD CF RTK" checked><label for="energy"  >Energy Index</label>
    <br><br>

    <!--Date Selection-->
     <h4 class="text-info"> Starting:</h4>
        <div class="form-group">
			<label for="fromyear">Year:</label><input type="text" placeholder="Starting Year" class="form-control" name="fromyear" id="fromyear"> 
		
			<label for="frommonth">Month:</label><input type="text" placeholder="Starting Month" class="form-control" name="frommonth" id="frommonth"> 
	
			<label for="fromday">Day:</label><input type="text" placeholder="Starting Day" class="form-control" name="fromday" id="fromday">
		</div>
	<br>
	<h4 class="text-info"> Ending: </h4>
	    <div class="form-group">
	    	<label for="toyear">Year: </label><input type="text" placeholder="Ending Year" class="form-control" name="toyear" id="toyear"> 
	    	   		<label for="tomonth">Month:</label><input type="text" placeholder="Ending Month" class="form-control" name="tomonth" id="tomonth"> 
	    
	    	<label for="today">Day:</label><input type="text" placeholder="Ending Day" class="form-control" name="today" id="today">
	    </div>
	<br>
	<div id="error">
	</div>
	<input type="submit" class="btn btn-success btn-lg" "value="submit">
    </form><br>
    <a class="btn btn-primary btn-xs" href="logout.php" >Log Out</a>

<br>
