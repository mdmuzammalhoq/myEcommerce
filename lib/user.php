<?php 

	class User
	{
		private $db;
		public function __construct()
		{
			$this->db = new Database();
		}

		public function userRegistration($data)
		{
			$member_name     = $data['member_name'];
			$member_email    = $data['member_email'];
			$chk_email = $this->emailCheck($member_email);
			$username = $data['username'];
			$password = md5($data['password']);

			if ($name == "" || $email == "" || $username == "" || $password == "") {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Field must not be empty !</div>";
				return $msg;
			}

			if (strlen($username) < 3 ) {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Username should be minimum 3 characters. </div>";
				return $msg;
			}elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Username should only contain alphanumerical, dashes and underline. </div>";
				return $msg;
			}

			if (filter_var($member_email, FILTER_VALIDATE_EMAIL) == false) {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>email is not valid ! </div>";
				return $msg;
			}

			if ($chk_email == true) {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>The mail is already used ! </div>";
				return $msg;
			}

			$sql = "INSERT INTO tbl_login_reg(name, member_email, username, password) VALUES(:name, :email, :username, :password)";
			$query = $this->db->pdo->prepare($sql);
			$query -> bindValue(':name', $name);
			$query -> bindValue(':email', $email);
			$query -> bindValue(':username', $username);
			$query -> bindValue(':password', $password);
			$result = $query ->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Success</strong>Data inserted successfully. </div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Sorry</div>";
				return $msg;
			}

		}

		public function emailCheck($member_email)
		{
			$sql = "SELECT member_email FROM tbl_login_reg WHERE member_email = :member_email ";
			$query = $this->db->prepare($sql);
			$query -> bindValue(':member_email', $member_email);
			$query -> execute();
			if ($query -> rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}



		public function getLoginUser($email,$username, $password)
		{
			$sql = "SELECT * FROM tbl_user WHERE email = :email, username = :username AND password = :password LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query -> bindValue(':username', $username);
			$query -> bindValue(':email', $email);
			$query -> bindValue(':password', $password);
			$query ->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		public function userLogin($data)
		{
			
			$email    = $data['email'];
			$chk_email = $this->emailCheck($email);
			$username = $data['username'];
			$password = md5($data['password']);

			if ($email == "" OR $username == "" OR $password == "") {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Field must not be empty !</div>";
				return $msg;
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>email is not valid ! </div>";
				return $msg;
			}


			$result = $this->getLoginUser($email,$username, $password);
			if ($result) {
				Session::init();
				Session::set(login, true);
				Session::set(id, $result->id);
				Session::set(name, $result->name);
				Session::set(username, $result->username);
				Session::set(loginmsg, "<div class='alert alert-success'><strong>Success</strong>You are logged in </div>");
				header("Location:index.php");
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error</strong>data not found ! </div>";
				return $msg;
			}
	}

	public function getUserData()
	{
		$sql = "SELECT * FROM tbl_user ORDER BY id DESC";
		$query = $this->db->pdo->prepare($sql);
		$query -> bindValue(':email', $email);
		$query -> execute();
		$result = $query->fetchAll();
		return $result;
	}

	public function getUserById($userid)
	{
		$sql = "SELECT * FROM tbl_user WHERE id = :id LIMIT 1";
					$query = $this->db->pdo->prepare($sql);
			$query -> bindValue(':id', $userid);
			$query ->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;

	}

	public function updateUserData($id, $data)
	{
		$name     = $data['name'];
		$email    = $data['email'];
		$username = $data['username'];

			if ($name == "" || $email == "" || $username == "" ) {
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Field must not be empty !</div>";
				return $msg;
			}

			

			$sql = "UPDATE tbl_user set
						name 	 = :name,
						email    = :email,
						username = :username
						WHERE id = :id
					";
			$query = $this->db->pdo->prepare($sql);
			$query -> bindValue(':name', $name);
			$query -> bindValue(':email', $email);
			$query -> bindValue(':username', $username);
			$query -> bindValue(':id', $id);
			$result = $query ->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Success</strong>Data UPDATEd successfully. </div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error</strong>Sorry not UPDATEd</div>";
				return $msg;
			}

		}
	}

?>