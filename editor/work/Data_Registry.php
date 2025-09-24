<?php
/**
 * Data_Registry
 *
 * NOTICE OF LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, version 3 of the License.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *  
 *  Copyright (c) 2010 Xavier Perez (http://www.4amics.com/x.perez)
*/

/**
 * @category   Data_Registry
 * @package    Data_Registry
 * @copyright  Copyright (c) 2010 Xavier Perez (http://www.4amics.com/x.perez)
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL v.3
 * @author     Xavier Perez 
 * @version    1.0.8
 */

/**
 * Class Data_Registry
 *
 * Store and retrieve data 
 * @package     Data_Registry
 * 
 */
class Data_Registry 
{
    /**
    * Global store of all namespaces and vars
    * @var array
    */    
    private static $vars    = array();
    /**
    * Instance of each namespace
    * @var array
    */    
    private static $instance = array();
    /**
    * Default namespace
    * @var string
    */    
    private static $defaultnamespace = "default";
    /**
    * Current namespace used
    * @var string
    */    
    private static $namespace = "";
    /**
    * Basename for namespaces
    * Provides a form to distinguish between datastorge variables and other variables 
    * @var string
    */    
    private static $basenamespace = 'DR_';
    /**
    * Basename for session namespaces
    * The name of the main SESSION element to save all namespaces and vars
    * @var string
    */    
    private static $sessionname = 'Data_Registry';
    /**
    * Global persistence
    * Enable or disable global persistence, by default, disabled
    * @var string
    */    
    private static $gpersistent = FALSE;
    /**
    * Local persistence settings
    * Array to save specified settings for local persistence
    * @var array
    */    
    private static $lpersistent = array();
    
    /**
    * Constructor, if there are global persistence, load data from store
    * 
    * Allows to restore namespace from SESSION automatically
    * 
    */
    protected function __construct()
    {
        if (self::$gpersistent === TRUE)
        {
            self::restoreNameSpace(TRUE);
        }
//        echo "CONSTRUCT";
    } 
    
    /**
    * Destructor, if there are persistence, save data in store
    * 
    * Allows to backup namespace in SESSION automatically
    * 
    */
    public function __destruct()
    {
        foreach (self::$vars as $key => $val)
        {
            if (self::$gpersistent === TRUE OR (isset(self::$lpersistent[$key]) && self::$lpersistent[$key] === TRUE))
            {
                self::$namespace = $key;
                self::backupNameSpace();
            }
        }
        self::$vars = array();
    } 
    
    /**
    * Load current pointer to given namespace
    *
    * @param  string  Namespace name
    */
    public static function init($nameSpace="")
    {
        // Set default is not specified
        if ($nameSpace == "")
            $nameSpace = self::$defaultnamespace;
             
        // Assign current namespace used
        self::$namespace =self::$basenamespace.$nameSpace;
        
        // Check exists current instance
        if (!isset(self::$instance[self::$namespace]))
            self::$instance[self::$namespace] = NULL;

        // Create new instance or return current
        if (self::$instance[self::$namespace] == NULL)
            self::$instance[self::$namespace] = new self();

        return self::$instance[self::$namespace];
    }
    
    /**
    * Change persistent default
    *
    * @param  boolean Enable / disable persistence
    * @param  boolean Affects global persistence 
    */
    public static function setPersistence($enable,$global=FALSE)
    {
        if ($enable === TRUE OR $enable === FALSE)
        {
               self::$lpersistent[self::$namespace] = $enable;
            if ($global === TRUE)
                self::$gpersistent = $enable;
        }
        if (isset(self::$instance[self::$namespace]))
            return self::$instance[self::$namespace];
        else
            return NULL;
    }
    
    /**
    * Change session Name 
    * 
    * Call it before any other command
    * 
    * @param  boolean Enable / disable persistence
    * @param  boolean Affects global persistence 
    */
    public static function setSessionName($name)
    {
        self::$sessionname = $name;
    } 
    
    /**
    * Save persistence to session (TRUE) / or destroy SESSION namespace (FALSE)
    *
    * @param  boolean Backup (TRUE) or Delete backup (FALSE)
    */
    public static function backupNameSpace($enable=TRUE)
    {
        if ($enable === TRUE)
        {
            $_SESSION[self::$sessionname][self::$namespace] = gzdeflate(serialize(self::$vars[self::$namespace]));
            self::$lpersistent[self::$namespace] = $enable;
        }
        if ($enable === FALSE && isset ($_SESSION[self::$namespace]))
        { 
            unset($_SESSION[self::$sessionname][self::$namespace]);
            self::$lpersistent[self::$namespace] = $enable;
        }
    }
    
    /**
    * Get persistent data from current SESSION
    *
    * @param  boolean All namespaces (TRUE) on only current namespace (FALSE)
    */
    public static function restoreNameSpace($all=FALSE)
    {
        if ($all === FALSE)
        {
            if (isset($_SESSION[self::$sessionname][self::$namespace]))
            {
                self::$vars[self::$namespace] = unserialize(gzinflate($_SESSION[self::$sessionname][self::$namespace]));
            }
            unset($_SESSION[self::$sessionname][self::$namespace]);
        }
        else
        {
            if (isset($_SESSION[self::$sessionname]))
            {
                foreach ($_SESSION[self::$sessionname] as $key => $val)
                {
                    if (preg_match('/^'.self::$basenamespace.'/',$key))
                    {                
                        if (!isset(self::$vars[$key]))
                        {
                            self::$vars[$key] = unserialize($val);
                        }
                        unset($_SESSION[self::$sessionname][$key]);
                    }
                }
            }
        }
    }
    
    /**
    * Get data
    *
    * @param  string  Varname to get
    * @return string|integer|boolean|date|array   
    */
    public static function get($var)
    {
        $data = FALSE;
        if (isset(self::$vars[self::$namespace][$var]))
        {
            $data=self::$vars[self::$namespace][$var];
        }
        return $data;
    }
    
    /**
    * Get datakey
    *
    * @param  string  Varname to get
    * @param  string  Key to get
    * @return string|integer|boolean|date|array   
    */
    public static function getKey($var,$key)
    {
        $data = FALSE;
        if (isset(self::$vars[self::$namespace][$var]))
        {
            if (is_array(self::$vars[self::$namespace][$var]) && isset(self::$vars[self::$namespace][$var][$key]))
                $data=self::$vars[self::$namespace][$var][$key];
            if (is_object(self::$vars[self::$namespace][$var]) && isset(self::$vars[self::$namespace][$var]->{$key}))
                $data=self::$vars[self::$namespace][$var]->{$key};
        }
           return $data;
    }
    
    /**
    * Get flash data
    *
    * Get a data and delete it from namespace
    * 
    * @param  string  Varname to get
    * @return string|integer|boolean|date|array   
    */
    public static function getFlash($var)
    {
        $data = FALSE;
        if (isset(self::$vars[self::$namespace][$var]))
        {
            $data=self::$vars[self::$namespace][$var];
            if (isset($_SESSION[self::$namespace][$var]))
                unset($_SESSION[self::$namespace][$var]);
            unset(self::$vars[self::$namespace][$var]);
        }
        return $data;
    }
    
    /**
    * Get flash datakey
    *
    * Get datakey and delete it from namespace
    * 
    * @param  string  Varname to get
    * @param  string  Key to get
    * @return string|integer|boolean|date|array   
    */
    public static function getFlashKey($var,$key)
    {
        $data = FALSE;
        if (isset(self::$vars[self::$namespace][$var]))
        {
            if (is_array(self::$vars[self::$namespace][$var]) && isset(self::$vars[self::$namespace][$var][$key]))
            {
                $data=self::$vars[self::$namespace][$var][$key];
                unset(self::$vars[self::$namespace][$var][$key]);
            }
            if (is_object(self::$vars[self::$namespace][$var]) && isset(self::$vars[self::$namespace][$var]->{$key}))
            {
                $data=self::$vars[self::$namespace][$var]->{$key};
                unset(self::$vars[self::$namespace][$var]->$key);
            }
            if (isset($_SESSION[self::$namespace][$var][$key]))
                unset($_SESSION[self::$namespace][$var][$key]);
        }
           return $data;
    }
    
    /**
    * Set data
    *
    * @param  string  Varname to save
    * @param  string|integer|boolean|array  Data to save
    */
    public static function set($var,$value)
    {
        self::$vars[self::$namespace][$var] = $value;
        return self::$instance[self::$namespace];
    }
    
    /**
    * Set datakey
    *
    * @param  string  Varname to save
    * @param  string  Key to save
    * @param  string|integer|boolean|array  Data to save
    */
    public static function setKey($var,$key,$value)
    {
        self::$vars[self::$namespace][$var][$key] = $value;
        return self::$instance[self::$namespace];
    }
    
    /**
    * Add data
    *
    * @param  string  Varname array to add a new element
    * @param  string|integer|boolean|array  Data to save
    */
    public static function add($var,$value)
    {
        self::$vars[self::$namespace][$var][] = $value;
        return self::$instance[self::$namespace];
    }

    /**
    * Test var
    *
    * @param  string  Varname to test
    * @return boolean   
    */
    public static function test($var)
    {
        if (isset(self::$vars[self::$namespace][$var]))
            return TRUE;
        else
            return FALSE;
    }
    
    /**
    * Test var key
    *
    * @param  string  Varname to test
    * @param  string  Key to test
    * @return boolean   
    */
    public static function testKey($var,$key)
    {
        if (isset(self::$vars[self::$namespace][$var][$key]))
            return TRUE;
        else
            return FALSE;
    }

    /**
    * Clear var
    *
    * @param  string  Varname to clear
    * @return boolean   
    */
    public static function clear($var)
    {
        if (isset(self::$vars[self::$namespace][$var]))
        {
            unset(self::$vars[self::$namespace][$var]);
            return TRUE;
        }
        else
            return FALSE;
    }
    
    /**
    * Clear var key
    *
    * @param  string  Varname 
    * @param  string  Key to clear
    * @return boolean   
    */
    public static function clearKey($var,$key)
    {
        if (isset(self::$vars[self::$namespace][$var][$key]))
        {
            unset(self::$vars[self::$namespace][$var][$key]);
            return TRUE;
        }
        else
            return FALSE;
    }

    /**
    * Clear namespace
    *
    * @return boolean   
    */
    public static function clearNameSpace()
    {
        if (isset(self::$vars[self::$namespace]))
        {
            unset(self::$vars[self::$namespace]);
            if (isset($_SESSION[self::$namespace]))
                unset($_SESSION[self::$namespace]);
            return TRUE;
        }
        else
            return FALSE;
    }
    
    /**
    * Get all vars in namespace
    *
    * @return array   
    */
    public static function getNameSpace()
    {
        if (isset(self::$vars[self::$namespace]))
        {
            return self::$vars[self::$namespace];
        }
        else
            return FALSE;
    }

    /**
    * Get all namespaces
    *
    * @return array   
    */
    public static function getAllNameSpaces()
    {
        if (isset(self::$vars))
        {
            return self::$vars;
        }
        else
            return FALSE;
    }
    
    /**
    * Set a class as an element of Data_Registry and get this class as new object
    * If exists current class, returns previous saved object
    *
    * @param  string  Classname 
    * @param  string  Prefix - allows to have copies of same class in Data_Registry
    * @return array   
    */
    public static function getClass($class,$prefix="")
    {
        if (!isset(self::$vars[self::$namespace][$class.$prefix]))
            self::$vars[self::$namespace][$class.$prefix] = new $class();
            
         return self::$vars[self::$namespace][$class.$prefix];         
    }
    
    /**
    * Get list of vars saved for current namespace
    *
    * @return array   
    */
    public static function listVars()
    {
        if (!isset(self::$vars[self::$namespace]))
            return array();
            
        $list = array();
        $index = 0;
        foreach (self::$vars[self::$namespace] as $key => $val)
        {
            $list[$index]["namespace"]     = self::$namespace;
            $list[$index]["varname"]     = $key;
            $list[$index]["vartype"]     = gettype($val);
            $list[$index]["varpersist"] = isset(self::$lpersistent[self::$namespace])?self::$lpersistent[self::$namespace]:0||self::$gpersistent;
            $index++;
        }
        return $list;
    }

    /**
    * Get list of vars saved for all namespaces
    *
    * @return array   
    */
    public static function listAllVars()
    {
        $list = array();
        $index = 0;
        foreach (self::$vars as $key => $val)
        {
            foreach ($val as $key2 => $val2)
            {
                $list[$index]["namespace"]     = $key;
                $list[$index]["varname"]     = $key2;
                $list[$index]["vartype"]     = gettype($val2); 
                $list[$index]["varpersist"] = isset(self::$lpersistent[$key])?self::$lpersistent[$key]:0||self::$gpersistent;
                $index++;
            }
        }
        return $list;
    }

}

