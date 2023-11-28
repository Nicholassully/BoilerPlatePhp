1. composer require --dev phpunit/phpunit ^9

2.   add that to composer.json

     "autoload": {
           "classmap": [
               "src/"
           ]
       },
      
3. To run test the command is composer test

This kata is to make a password checker to and return false if any of the following is not valid 

1. Have more than 8 characters
2. Contains a capital letter
3. Contains a lowercase
4. Contains a number
5. Contains an underscore
