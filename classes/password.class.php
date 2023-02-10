<?php
class Password
{
    private static array $K = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "r", "s", "t", "v", "w", "x", "y", "z"];
    private static array $V = ["a", "e", "i", "o", "u"];
    private static array $N = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];


    static function getPassword($block = 3) {
        mt_srand ((double)microtime()*1_000_000);
        $password = '';

        for($i = 0; $i < $block; $i++) {
            $password .= Password::$K[ random_int(0,count(Password::$K) - 1) ];
            $password .= Password::$V[ random_int(0,count(Password::$V) - 1) ];
            $password .= Password::$N[ random_int(0,count(Password::$N) - 1) ];
        }
        return $password;
  }
}
?>
