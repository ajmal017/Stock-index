<?php

    /**
     * functions.php
     *
     * Jordan Vartanian
     *
     */

    require_once("constants.php");

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
        exit;
    }

    /**
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */
    function dump($variable)
    {
        require("templates/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }


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

            //Loop through and download data for each symbol
            for($i=0; $i<count($symbol);$i++)
            {
                $handle = @fopen("http://ichart.yahoo.com/table.csv?s={$symbol[$i]}&a={$firstmonth}&b={$firstday}&c={$firstyear}&d={$month[$monthTotal]}&e={$day[$dayTotal]}&f={$year[$yearTotal]}&g=d&ignore=.csv", "r", false, $context);
                
                //if symbol does not exist
                if ($handle === false)
                {
                    $symbol[$i]=NULL;
                    continue;                    
                }

                // download title of CSV file and throw away
                $data=fgetcsv($handle);

                //loop through data
                while(($data = fgetcsv($handle)) !==FALSE)

                {
                    //date
                    $date[$i][]=$data[0];
                    //closing price
                    $check[$i][]=round($data[4],2);
                }
               //# of days 
               $numberDays[]=count($date[$i]);

               
            }
            //min and max count of days
            $minDays=min($numberDays);
            $maxDays=max($numberDays);

            foreach ($date as $key => $value) 
            {
                $checks[$date[$key]][]=$check[$key];
                //if only partial data on a stock ticker, set to null
                if(count($date[$key]) !==$maxDays)
                {
                     $check[$key]=NULL;
                     $symbol[$key]=NULL;
                }

            }
                //update stock tickers
               $symbolUpdate=count(array_filter($symbol));

               //call function to sum arrays with identical keys 
                if($check!==NULL)
                {
                    $reverse=array_mesh($check[0],$check[1],$check[2],$check[3],$check[4],$check[5],$check[6],$check[7],$check[8],
                    $check[9],$check[10],$check[11],$check[12],$check[13],$check[14],$check[15],$check[16],$check[17],$check[18],
                    $check[19],$check[20],$check[21],$check[22],$check[23],$check[24],$check[25],$check[26],$check[27],$check[28],
                    $check[29],$check[30],$check[31],$check[32],$check[33],$check[34],$check[35],$check[36],$check[37],$check[38],
                    $check[39],$check[40],$check[41],$check[42],$check[43],$check[44],$check[45],$check[46],$check[47],$check[48],$check[49],
                    $check[50]);

                }

            $dailyAverage=array_reverse($reverse);
            
            //find average price for all stock from a given day
            foreach ($dailyAverage as &$value)
            {
                $value=$value/$symbolUpdate;

            }

            $initial=$dailyAverage[0];

            //calculate daily change
            for ($j=0;$j<count($dailyAverage);$j++)
            {           
                //change from intial average BDs
                $dailyChange[]=($dailyAverage[$j]/$initial)*100;

            }


            foreach($dailyChange as $k => $value) 
            {

               $difference[]=$dailyChange[$k]; 
            
                //inital 12 day average 
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
                            


                //12 day average 
                if($k>11)
                {
                    $twelveDayEm[]=((($dailyChange[$k] * 2)/13)+($twelveDayEm[$k-1]*(1-(2/13))));
                }
                // 20 day average 
                if($k>19)
                {
                    $twentyDayEm[]=((($dailyChange[$k] * 2)/21)+($twentyDayEm[$k-1]*(1-(2/21))));
                }

                //26 day average 
                if($k>25)
                {
                    $twentySixDayEm[]=((($dailyChange[$k] * 2)/27)+($twentySixDayEm[$k-1]*(1-(2/27))));

                } 

                //Bollinger Bands
                if($k>=19)
                {
                  $lowerbb[$k]=$twentyDayEm[$k]-((standard_deviation_population($difference))*2);
                  $upperbb[$k]=$twentyDayEm[$k]+((standard_deviation_population($difference))*2);              
                  $what[]=array_shift($difference);
                }
                
            }


    //Twenty Day Charts
    foreach ($twentyDayEm as $key => $value) 
      {
        if($key==($maxDays-1))
        {
            $twentyDay .="[".$key.",".round($value,2)."]";
        }

        else
        {
            $twentyDay .="[".$key.",".round($value,2)."],";
        }
      }

      //Stock Index
      foreach ($dailyChange as $key => $value) 
      {
        if($key==($maxDays-1))
        {
            $stockIndex .="[".$key.",".round($value,2)."]";
        }

        else
        {
            $stockIndex .="[".$key.",".round($value,2)."],";
        }
      }


      //TwelveDay&Energy Charts
      foreach ($dailyChange as $key => $value) 
      {

       $key++;

        if($key>=11)
        {

            if($key==($maxDays-1))
            {
                $stockTwelve .="[".$key.",".round($value,2).",".round($twelveDayEm[$key],2)."]";
                break;
            }

            else
            {
                $stockTwelve .="[".$key.",".round($value,2).",".round($twelveDayEm[$key],2)."],";
            }

        }

        
      }

      //Bollinger Bands & Index Charts
      foreach ($dailyChange as $key => $value) 
      {

       $key++;

        if($key>=19)
        {
            if($key==($maxDays-1))
            {
                $bb .="[".$key.",".round($value,2).",".round($lowerbb[$key],2).",".round($upperbb[$key],2)."]";
                break;
            }
            else
            {
                $bb .="[".$key.",".round($value,2).",".round($lowerbb[$key],2).",".round($upperbb[$key],2)."],";
            }

        }

        
      }


    //Twelve & TwentySixDay & Energy Charts
      foreach ($dailyChange as $key => $value) 
      {

       $key++;
        if($key>=25)
        {

            if($key==($maxDays-1))
            {
                $stockTwelveTwentySix .="[".$key.",".round($value,2).",".round($twelveDayEm[$key],2).",".round($twentySixDayEm[$key],2)."]";
                break;
            }
            else
            {
                $stockTwelveTwentySix .="[".$key.",".round($value,2).",".round($twelveDayEm[$key],2).",".round($twentySixDayEm[$key],2)."],";
            }

        }

        
      }


    return [
    "bb" => $bb,
    "stockTwelveTwentySix"=> $stockTwelveTwentySix,
    "stockTwelve"=>$stockTwelve,
    "twentyDay" =>$twentyDay,
    "stockIndex" =>$stockIndex
    ];
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
 /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("templates/header.php");

            // render template
            require("templates/$template");

            // render footer
            require("templates/footer.php");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }

    

?>
