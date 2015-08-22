<?php

    /**
     * functions.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     */

    


    /**
     * Returns a stock by symbol (case-insensitively) else false if not found.
     */
    function lookup($year,$month,$day,$symbol)
    {
      
        // headers for proxy servers
        $headers = [
            "Accept" => "*/*",
            "Connection" => "Keep-Alive",
            "User-Agent" => sprintf("curl/%s", curl_version()["version"])
        ];
        // open connection to Yahoo
        $context = stream_context_create([
            "http" => [
                "header" => implode(array_map(function($value, $key) { return sprintf("%s: %s\r\n", $key, $value); }, $headers, array_keys($headers))),
                "method" => "GET"
            ]
        ]);

        
           //day variables
            $totalDays=count($day)*count($month);
            $firstday=$day[0];
             $dayTotal=count($day)-1;
             //month variables
             $firstmonth=$month[0];
             $monthTotal=count($month)-1;
             //year variables
             $firstyear=$year[0];
             $yearTotal=count($year)-1; 
             //symbol variables
             $symbols=count($symbol);
             //echo($day[$dayTotal]);
                        $row=0;

                         //$check=array();


            for($i=0; $i<count($symbol);$i++)
            {

                $handle = @fopen("http://ichart.yahoo.com/table.csv?s={$symbol[$i]}&a={$firstmonth}&b={$firstday}&c={$firstyear}&d={$month[$monthTotal]}&e={$day[$dayTotal]}&f={$year[$yearTotal]}&g=d&ignore=.csv", "r", false, $context);
                
                //if symbol does not exist
                if ($handle === false)
                {
                    // trigger (big, orange) error
                    echo(" ".$symbol[$i] . " does not exist");
                    continue;
                }

                // download title of CSV file and throw away
                $data=fgetcsv($handle);
                //loop through data
                while(($data = fgetcsv($handle)) !==FALSE)

                {

                    $check[$i][]=round($data[4],2);
                    $date[$i][]=$data[0];
                }

            }
             $reverse=array_mesh($check[0],$check[1],$check[2],$check[3],$check[4],$check[5],$check[6],$check[7],$check[8],
                $check[9],$check[10],$check[11],$check[12],$check[13],$check[14],$check[15],$check[16],$check[17],$check[18],
                $check[19],$check[20],$check[21],$check[22],$check[23],$check[24],$check[25],$check[26],$check[27],$check[28],
                $check[29],$check[30],$check[31],$check[32],$check[33],$check[34],$check[35],$check[36],$check[37],$check[38],
                $check[39],$check[40],$check[41],$check[42],$check[43],$check[44],$check[45],$check[46],$check[47],$check[48],$check[49],
                $check[50]);
            $dailyAverage=array_reverse($reverse);
            
            foreach ($dailyAverage as &$value)
            {
                $value=$value/$symbols;

            }

            $initial=$dailyAverage[0];

            for ($j=0;$j<count($dailyAverage);$j++)
            {           
                //change from intial average BDs
                $dailyChange[]=($dailyAverage[$j]/$initial)*100;

            }


            foreach($dailyChange as $k => $value) 
            {

               $difference[]=$dailyChange[$k]; 
            
                //inital 12 day average BE15
                if($k<=11)
                {

                    $sumarray[]=$dailyChange[$k];
                    $intialTwelveDay=(array_sum($sumarray)/12);
                    $twelveDayEm[11]=$intialTwelveDay;
                }
                //inital 20 day average
                if($k<=19)
                {

                    $sumarray1[]=$dailyChange[$k];
                    $intialTwentyDay=(array_sum($sumarray1)/20);
                    $twentyDayEm[19]=$intialTwentyDay;
                }
                //inital 26 day average 
                if($k<=25)
                {

                    $sumarray2[]=$dailyChange[$k];
                    $intialTwentySixDay=(array_sum($sumarray2)/26);
                    $twentySixDayEm[25]=$intialTwentySixDay;
                }
                            


                //12 day average BEs
                if($k>11)
                {
                    $twelveDayEm[]=((($dailyChange[$k] * 2)/13)+($twelveDayEm[$k-1]*(1-(2/13))));
                }
                // 20 day average BFs
                if($k>19)
                {
                    $twentyDayEm[]=((($dailyChange[$k] * 2)/21)+($twentyDayEm[$k-1]*(1-(2/21))));
                }

                //26 day average BGs
                if($k>25)
                {
                    $twentySixDayEm[]=((($dailyChange[$k] * 2)/27)+($twentySixDayEm[$k-1]*(1-(2/27))));

                } 

                //BFs(Bollinger Bands)
                if($k>=19)
                {
                  $lowerbb[]=$twentyDayEm[$k]-((standard_deviation_population($difference))*2);
                  $upperbb[]=$twentyDayEm[$k]+((standard_deviation_population($difference))*2);              
                  $what[]=array_shift($difference);
                }
            }
            var_dump($twelveDayEm);
      
            // close connection to Yahoo
            fclose($handle);


     
      
    }

    function array_mesh() 
    {
    // Combine multiple associative arrays and sum the values for any common keys
    // The function can accept any number of arrays as arguments
    // The values must be numeric or the summed value will be 0
    
    // Get the number of arguments being passed
    $numargs = func_num_args();
    // Save the arguments to an array
    $arg_list = func_get_args();
 
    // Create an array to hold the combined data
    $out = array();

    // Loop through each of the arguments
    for ($i = 0; $i < $numargs; $i++) {
        $in = $arg_list[$i]; // This will be equal to each array passed as an argument

        // Loop through each of the arrays passed as arguments
        foreach($in as $key => $value) {
            // If the same key exists in the $out array
            if(array_key_exists($key, $out)) {
                // Sum the values of the common key
                $sum = $in[$key] + $out[$key];
                // Add the key => value pair to array $out
                $out[$key] = $sum;
            }else{
                // Add to $out any key => value pairs in the $in array that did not have a match in $out
                $out[$key] = $in[$key];
            }
        }
    }
    
    return $out;
}


function standard_deviation_population ($a)
{
  //variable and initializations
  $the_standard_deviation = 0.0;
  $the_variance = 0.0;
  $the_mean = 0.0;
  $the_array_sum = array_sum($a); //sum the elements
  $number_elements = count($a); //count the number of elements

  //calculate the mean
  $the_mean = $the_array_sum / $number_elements;

  //calculate the variance
  for ($i = 0; $i < $number_elements; $i++)
  {
    //sum the array
    $the_variance = $the_variance + ($a[$i] - $the_mean) * ($a[$i] - $the_mean);
  }

  $the_variance = $the_variance / ($number_elements-1);

  //calculate the standard deviation
  $the_standard_deviation = pow( $the_variance, 0.5);

  //return the variance
  return $the_standard_deviation;
}

    

?>
