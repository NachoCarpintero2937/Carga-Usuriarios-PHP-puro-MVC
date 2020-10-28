<?php
class ConfigBD
{
    public $DBServer;
    public $DBName;
    public $UserName;
    public $Password;
    function __construct()
    {
        $this->DBServer = DB_SERVER;
        $this->UserName = DB_USERNAME;
        $this->Password = DB_PASSWORD;
        $this->DBName = DB_NAME;
    }
}
