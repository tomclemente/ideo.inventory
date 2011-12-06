<?php
	class Database
	{
		private $db_host = 'localhost';
		private $db_user = 'root';
		private $db_pass = '';
		private $db_name = 'inventory';
		private $result = array();   
		
		public function GetResult(){
		return $this->result;
		}
		
		
		public function connect() { 
		
		  if(!$this->con)  
			{  
				$myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);  
				if($myconn)  
				{  
					$seldb = @mysql_select_db($this->db_name,$myconn);  
					if($seldb)  
					{  
						$this->con = true;  
						return true;  
					} else  
					{  
						return false;  
					}  
				} else  
				{  
					return false;  
				}  
			} else  
			{  
				return true;  
			}  
		}
		
		public function disconnect()  {  
			if($this->con)  
			{  
				if(@mysql_close())  
				{  
							   $this->con = false;  
					return true;  
				}  
				else  
				{  
					return false;  
				}  
			}  
		} 
			
		private function tableExists($table)  
		{  
			$tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');  
			if($tablesInDb)  
			{  
				if(mysql_num_rows($tablesInDb)==1)  
				{  
					return true;  
				}  
				else  
				{  
					return false;  
				}  
			}  
		}  
		
		public function select($table, $where = null, $rows = '*',  $order = null)  
		{  
			$q = 'SELECT '.$rows.' FROM '.$table;  
			if($where != null)  
				$q .= ' WHERE '.$where;  
			if($order != null)  
				$q .= ' ORDER BY '.$order;  
			if($this->tableExists($table))  
		   {  
			$query = @mysql_query($q);  

			if($query)  
			{  
				$this->numResults = mysql_num_rows($query);  
				for($i = 0; $i < $this->numResults; $i++)  
				{  
					$r = mysql_fetch_array($query);  
					$key = array_keys($r);  
					for($x = 0; $x < count($key); $x++)  
					{  
						// Sanitizes keys so only alphavalues are allowed  
						if(!is_int($key[$x]))  
						{  
							if(mysql_num_rows($query) > 1)  
								$this->result[$i][$key[$x]] = $r[$key[$x]];  
							else if(mysql_num_rows($query) < 1)  
								$this->result = null;  
							else  
								$this->result[$key[$x]] = $r[$key[$x]];  
						}  
					}  
				}  
				return true;  
			}  
			else  
			{  
				return false;  
			}  
			}  
		else  
			return false;  
		}  
		
		/*public function insert($table,$values)
			{

				if($this->tableExists($table))
				{
					//$values = implode(',',$values);
					//$insert = 'INSERT INTO '.$table. 'VALUES ('.$values.')';
					
					$insert = 'INSERT INTO '.$table.' (item_name, item_barcode, emp_id, item_date_purchased, item_description, item_price, item_date_used, item_date_broken) VALUES 
							(\''.$values[0].'\',\''.$values[1].'\',\''.$values[2].'\',\''.$values[3].'\',\''.$values[4].
							'\',\''.$values[5].'\',\''.$values[6].'\',\''.$values[7].'\')';
					$ins = mysql_query("$insert");
					
			
				
			
				}
			
			
			
			}*/
		
		
		
		public function insert($table,$values,$rows = null)  
		    {  
		        if($this->tableExists($table))  
		        {  
		            $insert = 'INSERT INTO '.$table;  
		            if($rows != null)  
		            {  
		                $insert .= ' ('.$rows.')';  
		            }  

		            for($i = 0; $i < count($values); $i++)  
		            {  
		                if(is_string($values[$i]))  
		                    $values[$i] = '"'.$values[$i].'"';  
		            }  
				
				
				
		           $values = implode(",",$values);  
		            $insert .= ' VALUES ('.$values.')';  
		            $ins = @mysql_query($insert);  
			
		            if($ins)  
		            {  
		                return true;  
		            }  
		            else  
		            {  
		                return false;  
		            }  
		        } 
					//	echo $insert;
		    }
		
		
		public function update($table,$rows,$where)  
		{  
        if($this->tableExists($table))  
        {  
            // Parse the where values  
            // even values (including 0) contain the where rows  
            // odd values contain the clauses for the row  
            for($i = 0; $i < count($where); $i++)  
            {  
                if($i%2 != 0)  
                {  
                    if(is_string($where[$i]))  
                    {  
                    /*    if(($i+1) != null)  
                            $where[$i] = '"'.$where[$i].'" AND ';  
                        else  
                            $where[$i] = '"'.$where[$i].'"';  */
                    }  
                }  
            }  
            $where = implode('=',$where);  
  
            $update = 'UPDATE '.$table.' SET ';  
            $keys = array_keys($rows);  
            for($i = 0; $i < count($rows); $i++)  
           {  
                if(is_string($rows[$keys[$i]]))  
                {  
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';  
                }  
                else  
                {  
                    $update .= $keys[$i].'='.$rows[$keys[$i]];  
                }  
  
                // Parse to add commas  
                if($i != count($rows)-1)  
                {  
                    $update .= ',';  
                }  
            }  
            $update .= ' WHERE '.$where;  
            $query = @mysql_query($update);  
			//print_r($update);
            if($query)  
            {  
                return true;  
            }  
            else  
            {  
                return false;  
            }  
        }  
        else  
        {  
            return false;  
        }  
	}
		
	
	
}	


?>