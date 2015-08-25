# Stock-index
A program that will create indexes based on user, or preselected, stocks.

First Version.  A client wanted a streamlined way of pulling stock quotes, and creating stock and commodity 
indexes. This first version has been improved to output data from the Yahoo Finance API historical quotes. Due to Yahoo Finance's stubborn API, I had to download the data for each code, one at a time, then implement 
a function to take the daily sums and averages.  I have calculated the Bollinger Bands and will be implementing various charts and graphs in my next commit.  In addition, I will allow the user to submit stock quotes and dates that they would like to run.
<<<<<<< HEAD

Second Commit.  I have added a login/register function, as per my client's request. I have built a html form that will allow the user to submit stock quotes and selected dates to run, as well as a pre-built energy index (built using radio buttons),supplied by my client.  Currently, the program will only accept user defined symbols and pre-built indexes. My next commit will include full date functionality. I have built 4 charts for the client: Stock Index, Stock Index/12-day EMA, Stock Index/12-day and 26-day EMA, and Stock Index/Lower & Upper Boillinger Bands.  Currently, the program will ignore stock tickers that are either non-existent or non-existent during some of the dates. I will be speaking with my client about what they would like in regards to this situation and update accordingly.
=======
>>>>>>> a41f608c421bfbd8aab1eb9878e6714b4200ca64
