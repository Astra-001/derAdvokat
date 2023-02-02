<?php
class Password
{
    private static $K = array("b","c","d","f","g","h","j","k","l","m","n","p","r","s","t","v","w","x","y","z");
    private static $V = array("a","e","i","o","u");
    private static $N = array("1","2","3","4","5","6","7","8","9","0");


    static function getPassword($block = 3) {
        srand ((double)microtime()*1000000);
        $password = '';

        for($i = 0; $i < $block; $i++) {
            $password .= Password::$K[ rand(0,count(Password::$K) - 1) ];
            $password .= Password::$V[ rand(0,count(Password::$V) - 1) ];
            $password .= Password::$N[ rand(0,count(Password::$N) - 1) ];
        }
        return $password;
  }
}
?>
