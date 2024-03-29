<?php
class mail
{
    public $to;
    public $subject;
    public $contentType = "text/plain; charset=UTF-8";
    public $header = '';
    public $template;
    public $smarty;

    function __construct(public $from = EMAIL)
    {
        $this->smarty = new Smarty();
        $this->smarty->compile_dir = SMARTY_TEMPLATE_CACHE_DIR;
    }

    function send()
    {
        //return mail($this->to, $this->subject, $this->smarty->fetch(SMARTY_TEMPLATE_DIR . $this->template), "From: " . $this->from . "\r\nContent-Type: " . $this->contentType . "\r\n" . $this->header);
        return mail($this->to, $this->subject, trim($this->smarty->fetch(SMARTY_TEMPLATE_DIR . $this->template)), "Content-Type: " . $this->contentType . "\nFrom: " . $this->from . "\n" . $this->header);
    }

    function assign($var, $value)
    {
        return $this->smarty->assign($var, $value);
    }
}
?>
