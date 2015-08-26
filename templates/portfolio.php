    <form action="input.php" method="POST">


    <!--Stock Symbol Selection-->
    <h4 class="text-info">Select Stocks:</h4>
    	<div class="form-group">
    		<input type="radio" name="stocks" value="" checked><label for="symbols">User Supplied:</label><input type="text" placeholder="50 Symbol Limit" class="form-control"name="symbols"><br>(Separate symbols using either spaces or commas)
    	</div>
    		<input type="radio" name="stocks" value="XOM CVX RDS-A PTR TOT SNP COP IMO BP E STO EC SU MRO PBR MDU HES YPF XEC MUR DO RIG HERO CKH PBT LYB DOW DD NEU WLK MEOH GRA LXU HUN CE POL EMN VLO PSX MPC HFC PBF TSO DK CVI WNR ALJ APD CF RTK"><label for="stocks">Energy Index</label>
    <br><br>

    <!--Date Selection-->
     <h4 class="text-info"> Starting:</h4>
        <div class="form-group">
			<label for="fromyear">Year:</label><input type="text" placeholder="Starting Year" class="form-control" name="fromyear"> 
		
			<label for="frommonth">Month:</label><input type="text" placeholder="Starting Month" class="form-control" name="frommonth"> 
	
			<label for="fromday">Day:</label><input type="text" placeholder="Starting Day" class="form-control" name="fromday">
		</div>
	<br>
	<h4 class="text-info"> Ending: </h4>
	    <div class="form-group">
	    	<label for="toyear">Year: </label><input type="text" placeholder="Ending Year" class="form-control" name="toyear"> 
	    	   		<label for="tomonth">Month:</label><input type="text" placeholder="Ending Month" class="form-control" name="tomonth"> 
	    
	    	<label for="today">Day:</label><input type="text" placeholder="Ending Day" class="form-control" name="today">
	    </div>
	<br>
	<input type="submit" class="btn btn-success btn-lg" "value="submit">
    </form><br>
    <a class="btn btn-primary btn-xs" href="logout.php" >Log Out</a>

<br>
