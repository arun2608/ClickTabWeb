<?php
class LoginDao {
	function __construct($db) {
		$this->pdo = $db;
	}
	public function isAuthenticateUser ( $username, $password ){
		$query = "  SELECT
					U.id AS Id, 
					U.username AS UserName,
					U.name AS Name,
					U.email AS Email
					FROM user as U
					WHERE 1=1
					AND U.username='" . $username . "'
					AND U.password='" . md5($password) . "'
					AND U.status='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}	

}
