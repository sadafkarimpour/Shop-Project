<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_controller{

	public function __construct(){

		parent ::__construct();
		$this->load->helper(array('form', 'url'));
	}

	/**
	 * Users Table
	 * 
	 * 
	 */


	public function Userstable(){

		$this->load->database();
		$tbl="CREATE TABLE IF NOT EXISTS `Users`(
			`id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` varchar(255) NOT NULL,
			`lname` varchar(255) NOT NULL,
			`username` varchar(255) NOT NULL,
			`email` varchar(255) NOT NULL,
			`phonenumber` varchar(255) NOT NULL,
			`password` varchar(255) NOT NULL,
			`usertype` varchar(255) NOT NULL
		)";


		$this->db->query($tbl);
		$this->db->close();

	}
		/**
	 * Users Table
	 * 
	 * 
	 */


	public function Usersbuy(){

		$this->load->database();
		$tbl="CREATE TABLE IF NOT EXISTS `usersb`(
			`id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` varchar(255) NOT NULL,
			`lname` varchar(255) NOT NULL,
			`username` varchar(255) NOT NULL,
			`email` varchar(255) NOT NULL,
			`phonenumber` varchar(255) NOT NULL,
			`password` varchar(255) NOT NULL,
			`city` varchar(255) NOT NULL,
			`country` varchar(255) NOT NULL,
			`address` varchar(255) NOT NULL,
			`productid` int(255) NOT NULL
		)";


		$this->db->query($tbl);
		$this->db->close();

	}

	/**
     * Products Table
     * 
	 * 
	 */

	public function Productstable(){

		$this->load->database();
		$tbl="CREATE TABLE IF NOT EXISTS `Products`(
			`id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`productname` varchar(255) NOT NULL,
			`url` varchar(255) NOT NULL,
			`description` varchar(255) NOT NULL,
			`price` double NOT NULL,
			`currency`varchar(255) NOT NULL,
			`inventory` int(255) NOT NULL,
			`status` varchar(255) NOT NULL,
			`datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
			`category` varchar(255) NOT NULL,
			`city` varchar(255) NOT NULL,
			`country` varchar(255) NOT NULL,
			`address` varchar(255) NOT NULL
		)";


		$this->db->query($tbl);
		$this->db->close();

	}

	public function Category(){

		$this->load->database();
		$tbl="CREATE TABLE IF NOT EXISTS `category`(
			`category_id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`productid` int(255) NOT NULL,
			`category_name` varchar(255) NOT NULL
		)";


		$this->db->query($tbl);
		$this->db->close();

	}


	public function index(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header");
		$path="http://localhost/Shopproject/index.php/";

		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'products2'=>$path."Shop/products2",
		];

		$this->load->helper('url');
		$this->load->view("menu",$data);
		$this->load->view("index",$data);
		$this->load->view("footer",);


	}

	public function shopindex(){

		$this->Userstable();
		$this->Productstable();

		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["id"];
		$name = $_SESSION["name"];
		$lname = $_SESSION["lname"];
		$username = $_SESSION["username"];
		$email = $_SESSION["email"];
		$phonenumber = $_SESSION["phonenumber"];
		$password = $_SESSION["password"];
		$usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			'name'=>$name,
			'lname'=>$lname,
			'username'=>$username,
			'email'=>$email,
			'phonenumber'=>$phonenumber,
			'password'=>$password,
			'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
			'products'=>$path."Shop/products",
		];

		$this->load->helper('url');
		if ($usertype=="Seller"){
			
		    $this->load->view("header2");
			$this->load->view("menu1",$data);
			$this->load->view("dashboard",$data);

		}
		elseif($usertype=="Admin"){
			$this->load->view("header2");
			$this->load->view("menu1",$data);
			$this->load->view("dashboard",$data);
		}
		else{
			$this->load->view("header");
			$this->load->view("menu",$data);
			$this->load->view("index",$data);


		}
		$this->load->view("footer",);


	}

	public function dashboard(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["id"];
		$usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'upload'=>$path."Shop/upload",
			'products'=>$path."Shop/products",
			'products2'=>$path."Shop/products2",

		];
		$this->load->view("menu1",$data);
		$this->load->helper('url');
		$this->load->view("dashboard",$data);
		$this->load->view("footer",);


	}
	public function login(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'products'=>$path."Shop/products",
			'products2'=>$path."Shop/products2",

		];

		$this->load->helper('url');
		$this->load->view("menu",$data);
		$this->load->view("login",$data);
		$this->load->view("footer",);



	}

	public function doLogin()
	{
		$this->UsersTable();
		

		$email=$this->input->post('email');
		$password=$this->input->post('password');  
	
	
		$this->load->model('User_model');
		$result=$this->User_model->login($email, $password);
	 
		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}

		echo json_encode([
			'statusCode'=>201
		]);
	}

	
	public function register(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'products'=>$path."Shop/products",
			'products2'=>$path."Shop/products2",

		];

		$this->load->helper('url');
		$this->load->view("menu",$data);
		$this->load->view("register",$data);
		$this->load->view("footer",);



	}

	public function doregister(){
		
		$this->Userstable();

		$name=$this->input->post('name');
		$lname=$this->input->post('lname');
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$phonenumber=$this->input->post('phonenumber');
		$password=$this->input->post('password');
		$usertype=$this->input->post('usertype');
	
		$d = $this->load->model('User_model');
		$result=$this->User_model->register($name, $lname, $username ,$email, $phonenumber, $password, $usertype);

		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}
        else{
			echo json_encode([
				'statusCode'=>201
			]);
			return;
		}
		
	}

	public function logout(){
		$path="http://localhost/Shopproject/index.php/";

		unset($_SESSION["id"]);
		unset($_SESSION["name"]);
		unset($_SESSION["lname"]);
		unset($_SESSION["username"]);
		unset($_SESSION["email"]);
		unset($_SESSION["phonenumber"]);
		unset($_SESSION["password"]);
		unset($_SESSION["usertype"]);
		redirect($path);
	}



   public function searchuser(){
		
		$id=$this->input->post('id');

		$this->load->model('User_model');
		$result = $this->User_model->searchuser($id);
		// $result = $this->Task_model->Taskitems();

		if($result){
			echo json_encode($result);
			return;
		}

		echo json_encode([]);
	}

	public function save(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$lname=$this->input->post('lname');
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$phonenumber=$this->input->post('phonenumber');
		$password=$this->input->post('password');

		
		$d = $this->load->model('User_model');
		$result=$this->User_model->save($id, $name, $lname, $username ,$email, $phonenumber, $password);

		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}
        else{
			echo json_encode([
				'statusCode'=>201
			]);
			return;
		}

	}
    public function addproduct(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["id"];
		$usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu1",$data);
		$this->load->helper(array('url' , 'form'));
		// $this->load->view("uploadform",$data);
		$this->load->view("addproduct",$data);
		$this->load->view("footer",);
	}

	public function saveproduct(){
	
			$this->Productstable();
			// $this->Necklaces();
			

				$productname  = $this->input->post('productname');
				$description  = $this->input->post('description');
				$price        = $this->input->post('price');
				// $image     = $this->input->post('image');
				$currency     = $this->input->post('currency');
				$inventory    = $this->input->post('inventory');
				$country      = $this->input->post('country');
				$city         = $this->input->post('city');
				$category     = $this->input->post('category');
				$address      = $this->input->post('address');
	
	
				// Store the image details in the database
				$this->load->model('Products_model');
				$result = $this->Products_model->saveproduct(
					$productname,
					// $uploadeddata, // Use the uploaded file name
					$description,
					$price,
					$currency,
					$inventory,
					$country,
					$city,
					$category,
					$address
				);
	
				if ($result) {
					// Database operation was successful
					echo json_encode([
						'statusCode' => 200
					]);
				} else {
					// Database operation failed
					echo json_encode([
						'statusCode' => 201
					]);
				}
			
			// }
			// else{
			// 	echo json_encode([
			// 		'statusCode' => 201
			// 	]);
			// }


		
      
		
			
    }

	public function salestatus(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["id"];
		$usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'upload'=>$path."Shop/upload",
			'products'=>$path."Shop/products",
			'products2'=>$path."Shop/products2",

		];
		$this->load->view("menu1",$data);
		$this->load->helper('url');
		$this->load->view("salestatus",$data);
		$this->load->view("footer",);
	}
	


	public function upload(){

		$this->Userstable();
		$this->Productstable();
		// $insertedId = $this->input->get('id');
		// var_dump($insertedId);
		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$idproduct = $_SESSION["idproduct"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			// 'id'=>$id,
			// 'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'upload'=>$path."Shop/upload",
			'doupload'=>$path."Shop/do_upload",
			// 'insertedid'=>$insertedId,
			'idproduct'=>$idproduct,
			'products'=>$path."Shop/products",
			'products2'=>$path."Shop/products2",

		];
		$this->load->view("menu1",$data);

		$this->load->helper(array('url' , 'form'));
		$this->load->view("uploadform",$data);
		$this->load->view("footer",);
	}
	
	// public function do_upload() {
    //     // Set up upload configuration

	// 	// $config['upload_path'] = './assets/uploadedimages/';
    //     // $config['allowed_types'] = 'gif|jpg|jpeg|png';

    //     // $this->load->library('upload', $config);

	// 	// $uploaded_data = $this->upload->data();
	// 	// $uploaddata=	$uploaded_data['userfile'];
	// 	// $d = $this->load->model('Products_model');
	// 	// $result=$this->Products_model->upload($uploaddata);

	// 	// if($result){
	// 	// 	echo json_encode([
	// 	// 		'statusCode'=>200
	// 	// 	]);
	// 	// 	return;
	// 	// }
	// 	// else{
	// 	// 	echo json_encode([
	// 	// 		'statusCode'=>201
	// 	// 	]);
	// 	// 	return;
	// 	// }
    //     $config['upload_path'] = './assets/uploadedimages/';
    //     $config['allowed_types'] = 'gif|jpg|jpeg|png';

    //     $this->load->library('upload', $config);
    //     if (  $this->upload->do_upload('userfile')) {
    //         // Handle upload error

	// 		$uploaded_data = $this->upload->data();
	
	// 	} else {
    //         // File uploaded successfully
	// 		echo json_encode([
	// 			'statusCode'=>201
	// 		]);
	// 		return;
    //     }
    // }





	public function do_upload() {
		$idproduct = $_SESSION["idproduct"];
		$category_name = $_SESSION["category_name"];
	
		$config['upload_path'] = './assets/uploadedimages/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$this->load->library('upload',$config);
	
		// if (!$this->upload->do_upload('userfile')) {
		// 	// File upload failed
		// 	echo json_encode(['statusCode' => 201]);
		// 	return;
		// }
		if($this->upload->do_upload('userfile')){
					$uploaded_data = $this->upload->data();
					// $insertedid = $this->input->post('insertedid');
					// var_dump($insertedid);
					$file_name = $uploaded_data['file_name'];
					$this->load->model('Products_model');
					$result = $this->Products_model->upload($file_name,$idproduct, $category_name);
				
					if ($result) {
						echo json_encode(['statusCode' => 200]);
						redirect(base_url('index.php/Shop/Products1'));
					} else {
						echo json_encode(['statusCode' => 201]);
					}
		}
		


	}

	public function Products(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		// $id = $_SESSION["id"];
		// $usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			// 'id'=>$id,
			// 'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu",$data);
		$this->load->helper(array('url' , 'form'));
		$this->load->view("products",$data);
		$this->load->view("footer",);
	}
	public function Products1(){

		$this->Userstable();
		$this->Productstable();
		$idproduct = $_SESSION["idproduct"];
		$category_name = $_SESSION["category_name"];
		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		// $id = $_SESSION["id"];
		// $usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'productid'=>$idproduct,
			'category_name'=>$category_name,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu1",$data);
		$this->load->helper(array('url' , 'form'));
		$this->load->view("products",$data);
		$this->load->view("footer",);
	}
	
	public function Products2(){

		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		// $id = $_SESSION["id"];
		// $usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu",$data);
		$this->load->helper(array('url' , 'form'));
		$this->load->view("products2",$data);
		$this->load->view("footer",);
	}
	
	public function Searchproducts(){
		// $limit=$this->input->post('limit');
        // $offset=$this->input->post('offset');

		$this->load->model('Products_model');
		$result = $this->Products_model->productitems();

		if($result){
			echo json_encode($result);
			return;
		}

		echo json_encode([]);
	}

	public function viewproduct(){
		
		$this->Userstable();
		$this->Productstable();

		$id=$this->input->post('id');

		$d = $this->load->model('Products_model');
		$result=$this->Products_model->view($id);

		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}
        else{
			echo json_encode([
				'statusCode'=>201
			]);
			return;
	
	}

	}
	public function view(){
		
		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["id"];
		// $usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			// 'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu",$data);
		$this->load->helper(array('url' , 'form'));
		$this->load->view("oneproduct",$data);
		$this->load->view("footer",);
	}
		
	public function Searchviewproducts(){
		// $limit=$this->input->post('limit');
		// $offset=$this->input->post('offset');
		$id = $_SESSION["id"];
		$this->load->model('Products_model');
		$result = $this->Products_model->productitemsview($id);

		if($result){
			echo json_encode($result);
			return;
		}

		echo json_encode([]);
	}
	
	public function getcategory(){
		$this->Category();

		$category_name=$this->input->post('category_name');
		$productid=$this->input->post('productid');

		$this->load->model('Products_model');
		$result = $this->Products_model->getcategory($category_name, $productid);

		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}
        else{
			echo json_encode([
				'statusCode'=>201
			]);
			return;
		}
		
	}
	public function show_category(){

		$this->Category();

		$this->load->model('Products_model');
		$result = $this->Products_model->show_category();

		if($result){
			echo json_encode($result);
			return;
		}

		echo json_encode([]);
	}

	public function buy(){
		$this->Userstable();
		$this->Productstable();

		$id=$this->input->post('id');

		$d = $this->load->model('Products_model');
		$result=$this->Products_model->buy($id);

		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}
		else{
			echo json_encode([
				'statusCode'=>201
			]);
			return;

	}
}



	public function buyproduct(){
			
		$this->Userstable();
		$this->Productstable();

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["id"];
		// $usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			// 'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu",$data);
		$this->load->helper(array('url' , 'form'));
		$this->load->view("buyproduct",$data);
		$this->load->view("footer",);
	}

	public function saveuserbuy(){
		
		$this->Usersbuy();

		$name=$this->input->post('name');
		$lname=$this->input->post('lname');
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$phonenumber=$this->input->post('phonenumber');
		$password=$this->input->post('password');
		$city=$this->input->post('city');
		$country=$this->input->post('country');
		$address=$this->input->post('address');
		$productid=$this->input->post('productid');
		$category=$this->input->post('category');

	
		$d = $this->load->model('Products_model');
		$result=$this->Products_model->saveuserbuy($name, $lname, $username ,$email, $phonenumber, $password, $city, $country,$address, $productid, $category);

		if($result){
			echo json_encode([
				'statusCode'=>200
			]);
			return;
		}
        else{
			echo json_encode([
				'statusCode'=>201
			]);
			return;
		}
		
	}
	public function zarinpal(){
			
		$this->Usersbuy();
	

		$this->load->view("header2");
		$path="http://localhost/Shopproject/index.php/";
		$id = $_SESSION["iduser"];
		// $usertype = $_SESSION["usertype"];
		$data=[

			'PATH' => $path,
			'urllogin' => $path."Shop/login",
			'urlregister' => $path."Shop/register",
			'urllogout' => $path."Shop/logout",
			'id'=>$id,
			// 'usertype'=>$usertype,
			'urldashboard'=>$path."Shop/dashboard",
			'addproduct'=>$path."Shop/addproduct",
			'salestatus'=>$path."Shop/salestatus",
			'products'=>$path."Shop/products",
			'upload'=>$path."Shop/upload",
			'products2'=>$path."Shop/products2",
		];
		$this->load->view("menu",$data);
		$this->load->helper(array('url' , 'form'));
		$this->load->view("zarinpal",$data);
		$this->load->view("footer",);
	}
}
