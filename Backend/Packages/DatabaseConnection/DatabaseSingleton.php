<?php

class DatabaseSingleton
{
    private static $dbName = 'catalyst_h';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $connection = null;

    protected $query;
    protected $show_errors = TRUE;
    protected $query_closed = TRUE;
    public $query_count = 0;
    
    
    private function __construct()
    {
        die('Init function is not allowed');
    }

    public static function getConnection()
    {
        // One connection through whole application
        /*        if (null == self::$connection) {
        //            try {
        //                self::$connection =  mysqli_connect(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName);
                        self::$connection = new mysqli(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName);
        //                echo "Connected successfully";
        //            } catch (PDOException $e) {
        //                die("Oops");
        //                echo "Connection failed: " . $e->getMessage();
        //            }
                    if (self::$connection->connect_error) {
                        die("Connection failed: " . self::$connection->connect_error);
                    }
        
                }*/

        if (null == self::$connection) {

            self::$connection = new mysqli(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName);
            if (self::$connection->connect_error) {
                self::$connection->error('Failed to connect to MySQL - ' . self::$connection->connect_error);
            }
            
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }

        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }





    public function query($query) {
        if (!$this->query_closed) {
            $this->query->close();
        }
        if ($this->query = self::$connection->prepare($query)) {
            if (func_num_args() > 1) {
                $x = func_get_args();
                $args = array_slice($x, 1);
                $types = '';
                $args_ref = array();
                foreach ($args as $k => &$arg) {
                    if (is_array($args[$k])) {
                        foreach ($args[$k] as $j => &$a) {
                            $types .= $this->_gettype($args[$k][$j]);
                            $args_ref[] = &$a;
                        }
                    } else {
                        $types .= $this->_gettype($args[$k]);
                        $args_ref[] = &$arg;
                    }
                }
                array_unshift($args_ref, $types);
                call_user_func_array(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
            if ($this->query->errno) {
                $this->error('Unable to process MySQL query (check your params) - ' . $this->query->error);
            }
            $this->query_closed = FALSE;
            $this->query_count++;
        } else {
            $this->error('Unable to prepare MySQL statement (check your syntax) - ' . self::$connection->error);
        }
        return $this;
    }


    public function fetchAll($callback = null) {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            if ($callback != null && is_callable($callback)) {
                $value = call_user_func($callback, $r);
                if ($value == 'break') break;
            } else {
                $result[] = $r;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }

    public function fetchArray() {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            foreach ($row as $key => $val) {
                $result[$key] = $val;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }

    public function close() {
        return self::$connection->close();
    }

    public function numRows() {
        $this->query->store_result();
        return $this->query->num_rows;
    }

    public function affectedRows() {
        return $this->query->affected_rows;
    }

    public function lastInsertID() {
        return self::$connection->insert_id;
    }

    public function error($error) {
        if ($this->show_errors) {
            exit($error);
        }
    }

    private function _gettype($var) {
        if (is_string($var)) return 's';
        if (is_float($var)) return 'd';
        if (is_int($var)) return 'i';
        return 'b';
    }
    
    
    
    
    
    
    
    
    
    
    
    


}