<?php
class DB {

	protected $db;
	protected $host, $username, $password, $database;

    public function __construct(array $config) 
	{
		$this->host = $config['db']['host'];
        $this->username = $config['db']['username'];
        $this->password = $config['db']['password'];
        $this->database = $config['db']['database'];
		$this->getConnection();
	}

	public function getConnection()
	{
		try {
			$this->db = new mysqli($this->host, $this->username, $this->password, $this->database);
		} catch (mysqli_sql_exception $exception) {
			exit('KONEKSI GAGAL:'  . $exception->getMessage());
		}
		return $this->db;
	}

	public function query($sql) {
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