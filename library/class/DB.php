<?php
abstract class DBAbstract {
	abstract public function getConnection();
	abstract public function query(string $query);
	abstract public function close();
}
class DB extends DBAbstract {

	protected $db;
	protected $dbHost, $dbUsername, $dbPassword, $dbName;

    public function __construct(array $config) 
	{
		$this->dbHost = $config['db']['host'];
        $this->dbUsername = $config['db']['username'];
        $this->dbPassword = $config['db']['password'];
        $this->dbName = $config['db']['database'];
		$this->getConnection();
	}

	public function getConnection()
	{
		try {
			$this->db = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
		} catch (mysqli_sql_exception $exception) {
			exit('KONEKSI GAGAL:'  . $exception->getMessage());
		}
		return $this->db;
	}

	public function query(string $sql) 
	{
        $query = $this->db->query($sql);
        if ($query == false) return false;
        return $query;
    }

	public function close()
	{
        return $this->db->close();
    }
}
?>