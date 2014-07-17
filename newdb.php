<?PHP
class database
{
	private $link;
	private $res;
	private $host = "fan1331011230159.db.12081004.hostedresource.com";
	private $user = "fan1331011230159";
	private $pass = "F90fgh314@";
	private $db = "fan1331011230159";

	public function setup($u, $p, $h, $db)
	{
		$this->user = $u;
		$this->pass = $p;
		$this->host = $h;
		$this->db = $db;
		if(isset($this->link))
			$this->disconnect();
		$this->connect();

	}

	public function pick_db($db)
	{
		$this->db = db;
	}

	public function disconnect()
	{
		if(isset($this->link))
			mysql_close($this->link);
		unset($this->link);
	} 
	public function connect()
	{
		
		if(!isset($this->link))
		{
			try{
				if(!$this->link=mysql_connect($this->host,$this->user,$this->pass))
				{
					throw new Exception("cannot connect");
					
				}
				

			}catch (Exception $e)
			{
				echo $e->getMessage();
				
				exit;
			}
		}
		else{
			$this->disconnect();
			$this->connect();
			echo "Conmnnnn";
		}
	}
	public function send_sql($sql)
	{
		if(!isset($this->link))
			$this->connect();
		try{
			if(!$succ = mysql_select_db($this->db))
				throw new Exception("Could not select database");
			if(!$this->res = mysql_query($sql, $this->link))
				throw new Exception("Could not send query");
				

		}catch(Exception $e)
		{
			echo $e->getMessage()."<BR>";
			echo mysql_error();
			exit;
		}
		return $this->res;
	}

	public function new_db($name)
	{
		if(!isset($this->link))
			$this->connect();
		$query = "CREATE DATABASE IF NOT EXISTS".$name;
		
	}

	public function next_row()
	{
		if (isset ($this->res))
			return mysql_fetch_row($this->res);
		echo "You need to make a query first!!!";
		return false;
	}


	public function insert_id ()
	{ 
		if (isset ($this->link)) 
		{
			$id = mysql_insert_id ($this->link); 
			if ($id == 0)
				echo "You did not insert an element that cause an auto-increment ID to be created!<BR>";
			return $id;
		}
		echo "You are not connected to the database!"; return false;
	}



}