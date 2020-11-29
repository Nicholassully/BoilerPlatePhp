1. Run `composer install`

2. To run tests `composer test` this will set the watcher for the tests running

3. If I had more time I would have done TDD for all the days of the week <br>
however as I got four out seven and there was a time limit  choose <br>
focus on getting more functionality working.<br/>
I would have added a provider to refactor the tests if I was to test all<br>
the scenarios.<br>
I would have added a method to deal with bank holidays. I would also have added<br>
more defensive coding by checking for `null` and making sure the format of the<br>
date and time being passed in was correct.

4. I broke down the problem into logical steps. <br>
I wrote pseudo code for each step then added this to a flow chat structure.<br>
Then did TDD for each of the steps I wrote out in the chart.<br>
I refactored the code after each new passing test.<br>
I then did a final refactor of the code pulling out conditions to their methods<br>
and ensuring names were intuitive.<br>
I was able to do this with confidence as I had all my tests to make sure<br>
I did not break the code.

5. Resources I used:
    1. https://carbon.nesbot.com/docs/ 
    2. https://stackoverflow.com/questions/32549221/convert-string-to-carbon
    3. https://stackoverflow.com/questions/45331219/php-carbon-check-if-now-is-between-two-times-10pm-8am
    4. https://stackoverflow.com/questions/39508963/calculate-difference-between-two-dates-using-carbon-and-blade
 

