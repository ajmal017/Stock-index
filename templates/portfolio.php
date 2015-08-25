<div>
    <form action="input.php" method="POST">
    Select Stocks: 
    <input type="radio" name="stocks" value="" checked>User Supplied<input type="text" name="symbols">(50 Symbol Max.  Separate tickers using either spaces or commas)<br>

    OR: 
    <input type="radio" name="stocks" value="XOM CVX RDS-A PTR TOT SNP COP IMO BP E STO EC SU MRO PBR MDU HES YPF XEC MUR DO RIG HERO CKH PBT LYB DOW DD NEU WLK MEOH GRA LXU HUN CE POL EMN VLO PSX MPC HFC PBF TSO DK CVI WNR ALJ APD CF RTK">Energy
    <br><br>
    Starting: Year:<input type="text" name="fromyear"> Month:<input type="text" name="frommonth"> Day:<input type="text" name="fromday"><br>
    <br>
    Ending: Year:<input type="text" name="toyear"> Month:<input type="text" name="tomonth"> Day:<input type="text" name="today">
    <input type="submit" value="submit">
    </form>
</div>
<br>
<div>
    <a href="logout.php">Log Out</a>
</div>
