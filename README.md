# Stock-index
A program that will create indexes based on user, or preselected, stocks.

First Version.  A client wanted a streamlined way of pulling stock quotes, and creating stock and commodity 
indexes. This first version has been improved to output data from the Yahoo Finance API historical quotes. Due to Yahoo Finance's stubborn API, I had to download the data for each code, one at a time, then implement 
a function to take the daily sums and averages.  I have calculated the Bollinger Bands and will be implementing various charts and graphs in my next commit.  In addition, I will allow the user to submit stock quotes and dates that they would like to run.
