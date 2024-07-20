<?php 

defined('BASEPATH') OR exit('No direct script access allowed');



class User_model extends CI_Model{


	/**
     * شناسه کاربر
     *
     * @var int
     */ 

	public $id;

	/**
     * نام کاربر
     *
     * @var string
     */ 

	public $name;


	/**
     * نام خانوادگی کاربر
     *
     * @var string
     */ 

	public $lname;



	/**
     * نام کاربری
     *
     * @var string
     */ 

	public $username;

	/**
     * ایمیل کاربری
     *
     * @var string
     */ 

	public $email;


	/**
     * شماره تلفن کاربری
     *
     * @var string
     */ 

	public $phonenumber;




	/**
     * رمز عبور به صررت (hash)
     *
     * @var string
     */ 

	public $password;


	/**
     * نوع کاربر
     *
     * @var string
     */ 

	public $usertype;


	


	public static function register($name, $lname, $username ,$email, $phonenumber, $password, $usertype)
	{
		 
		$c = &get_instance();
		$c->load->database();
		$check=$c->db->query("SELECT * FROM `Users` WHERE `email`='$email'");

        $num_rows=$check->num_rows();
	    if($num_rows>=1){
			return array("statusCode"=>201);
			
		}
		 
	    else{
			$result = $c->db->query("INSERT INTO `Users` ( `name`, `lname`, `username`,`email`, `phonenumber`, `password`, `usertype` ) VALUES ('$name', '$lname', '$username' ,'$email', '$phonenumber', '$password', '$usertype')");
            if($result){
				if ($usertype=="Admin" & $email=="sadaf.kp81@gmail.com"){

					return array("statusCode"=>200);
	
				}
				elseif ($usertype=="Seller" & $email=="behnaz.m1346@gmail.com"){

					return array("statusCode"=>200);

				}
				elseif ($usertype=="Seller" & $email=="asal.karimpour@gmail.com"){

					return array("statusCode"=>200);
					
				}
				elseif ($usertype=="User"){

					return array("statusCode"=>200);
					
				}
				else{
					return array("statusCode"=>201);
				
				}
				
			}
			else{
				return array("statusCode"=>201);
			
			}
		
		}
 
	}

	public static function login($email, $password)
	{
		 
		 $c = &get_instance();
		 $c->load->database();
	    
		//  $username=$c->input->post('username');
		//  $password=$c->input->post('password');
		//  $membertype=$c->input->post('membertype');
		
	
		$check = $c->db->query("SELECT * From  `Users` WHERE email='$email' and password='$password'  ");
		$num_rows=$check->num_rows();
	    if($num_rows===1){
			 foreach ($check->result() as $row)
		 {
 
			if($row->email==$email and $row->password==$password){

				
		
				$_SESSION["id"]=$row->id;
				$_SESSION["usertype"]=$row->usertype;
				$_SESSION["name"]=$row->name;
				$_SESSION["lname"]=$row->lname;
				$_SESSION["username"]=$row->username;
				$_SESSION["email"]=$row->email;
				$_SESSION["phonenumber"]=$row->phonenumber;
				$_SESSION["password"]=$row->password;

				return true;
				
				
			}
			else{
				return false;
			}
				
		 }
	    }
	    else
	    {
		  
		   return false;
	    }
	
	}

	public static function searchuser($id)
	{
		$c = &get_instance();
		$c->load->database();
		$userinfo=[];
		$result = $c->db->query("SELECT * FROM `Users` WHERE id=$id");
		foreach ($result->result() as $row)
		{		
			$userin = new User_model();
		
			$userin->id = $row->id;
			$userin->name=$row->name;
			$userin->lname=$row->lname;
			$userin->username=$row->username;
			$userin->email=$row->email;
			$userin->phonenumber=$row->phonenumber;
			$userin->password=$row->password;
			$userin->usertype=$row->usertype;


			
			$userinfo[] = $userin;
           
		
		}
	return $userinfo;



	}


	public static function save($id, $name, $lname, $username ,$email, $phonenumber, $password){
		$c = &get_instance();
		$c->load->database();
		$result = $c->db->query("UPDATE `Users` SET  name='$name', lname='$lname', username='$username' , email='$email' , phonenumber='$phonenumber' , password='$password' WHERE id='$id' ");
		
	    if($result){
			return array("statusCode"=>200);
		 }
		 else{
			return array("statusCode"=>201);
		 
		 }
	}
}
