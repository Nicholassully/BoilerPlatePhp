1. composer require --dev phpunit/phpunit ^9

2.   add that to composer.json

     "autoload": {
           "classmap": [
               "src/"
           ]
       },
      
3. To run test the command is composer test

4. Using Carbon in this for anything to do with time to use it <br/> 
have a used statement at the top looking like `use Carbon\Carbon;`<br/>
then just call it like `Carbon::now();` or many others docs found<br/>
https://carbon.nesbot.com/#gettingstarted

5. Installing Carbon is by running `composer require nesbot/carbon`<br/>
in the command line


