<?php
session_start();
class reload_check 
{
    /**
     * In welchem Array werden die Tokens in der Session gespeichert?
     * @var        string
     * @access    private
     */
    #private $tokenarray = 'token_array';
    /**
     * Wie soll das hidden element heißen?
     * @var        string
     * @access    public
     */
    #public $tokenname = 'token_check';

    private $_smarty = null;
 	private $_database = null;

	public function __construct($_smarty,$_database)
	{
		$this->_smarty = $_smarty;
		$this->_database = $_database;
		
	}	
    public function get_formtoken(&$_smarty,&$_database) 
    {
        $tok = md5(uniqid("foobarmagic"));
   		return $tok;
   		#sprintf("<input type='hidden' name='%s' value='%s'>",$this->tokenname,htmlspecialchars($tok));
    }

    public function easycheck(&$_smarty,&$_database) 
    {
        echo "easycheckPOST-". $tok = $_POST['token_check']."<br>";

       
        if (isset($_SESSION['token_check'])!=$tok) 
        {
        	echo "<br>FALSE";
            return false;
        } 
        else 
        {
        	echo "<br>TRUE";
            return true;
        }
    }
}
?>