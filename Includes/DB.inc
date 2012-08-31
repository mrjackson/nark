 <?php
	class DBCon
	{
		private $connection, $dbcon = 'sqlite:<ABSOLUTE PATH HERE>auth.sqlite', $result;

		function __construct()
		{
			$this->connection = new PDO($this->dbcon);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		function __destruct()
		{
			$this->connection = null;
		}

		function Query($sql,$attr = NULL)
		{
			try
			{
				if (!is_null($attr))
				{
					$sth = $this->connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$sth->execute($attr);
				}
				else
				{
					$sth = $this->connection->prepare($sql);
					$sth->execute();
				}
				
				if (strtoupper(substr($sql,0,6)) == 'SELECT')
				{
					return $sth->fetchAll(PDO::FETCH_CLASS);
				}
			}
			catch (PDOException $e)
			{
				echo "SQL Error: " . $e->getTraceAsString();
			}
		}
	}
?>
