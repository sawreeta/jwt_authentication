<?php
require 'jwt_helper.php';
define('secret_key','sarit_github');
define('valid_for',3600);



function authenticate($user,$pass) 
{  
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jwt_auth";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}*/

	if ($user!='' && $pass!='') 
	{
        $pw = md5($pass);

		/*$sql = $conn->query("SELECT id,username,pass from tbl_users where username='".$user."' and pass='".$pw."'");	
		$row = $sql->fetch_assoc(); //print_r($row);exit;
		$db_usr = $row['username'];
		$db_usr_pw = $row['pass'];*/
		
	   // if ($user == $db_usr && $pw == $db_usr_pw)
	   if ($user =='sarita' && $pw == 'c3db612be96e74a8c98023732d1d5f7e') 
		{ 
			//$db_usr_id = $row['id'];
			$db_usr_id = 2;
            $token = array();
            $token['id'] = $db_usr_id;
			//$token['db_usr'] = $db_usr;
			$token['db_usr'] = 'sarita';
            $token['exp'] = time() + valid_for;
            return json_encode(array('token' => JWT::encode($token, secret_key))); 
			/*$tokens = JWT::decode('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTg3LCJkYl91c3IiOiJ0ZXN0dXNlciIsImV4cCI6MTUxMjU0NzU1OX0.XbE8xT7UdwkAqTrcFeVVuI70zrQhT4S3iSwIoEt5hXk', $secret_key);
			echo $tokens->id;
			echo $tokens->db_usr;*/
            //return true;
        } else {
            http_response_code(401);
            return false;
        }
    } else {
        $headers = getallheaders();
        if (array_key_exists('Authorization', $headers)) {
            $jwt = $headers['Authorization'];
            $token = JWT::decode($jwt, secret_key);
            if ($token->exp >= time()) {
                //loggedin
                return $token->id;
            } else {
                http_response_code(401);
                return false;
            }
        } else {
            http_response_code(401);
            return false;
        }
    }
}

function decodeAuth($token)
{
	$token = JWT::decode($token, secret_key);
	if ($token->exp >= time()) {
		//loggedin
		return $token;
	} else {
		http_response_code(401);
		return false;
	}	
}

?>