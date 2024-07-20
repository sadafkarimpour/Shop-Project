<?php 

defined('BASEPATH') OR exit('No direct script access allowed');



class Products_model extends CI_Model{


	/**
     * شناسه محصول
     *
     * @var int
     */ 

	public $id;

	/**
     * نام محصول
     *
     * @var string
     */ 

	public $productname;


	/**
     * آدرس عکس محصول
     *
     * @var string
     */ 

	public $url;


	/**
     * توضیحات محصول
     *
     * @var string
     */ 

	public $description;

	/**
     *  هزینه
     *
     * @var string
     */ 

	public $price;

	/**
     *  واحد پول
     *
     * @var string
     */ 

	public $currency;


	/**
     * موجودی
     *
     * @var string
     */ 

	public $inventory;




	/**
     * دسته بندی
     *
     * @var string
     */ 

	public $category;


	/**
     * وضعیت محصول
     *
     * @var string
     */ 

	public $status;

	
	/**
     * تاریخ آپلود شده
     *
     * @var string
     */ 

	public $datetime;


	
	/**
     * شهر
     *
     * @var string
     */ 

	public $city;
/**
     * کشور
     *
     * @var string
     */ 

	public $country;
	/**
     * آدرس
     *
     * @var string
     */ 

	public $address;

	
	public static function saveproduct($productname, $description, $price, $currency, $inventory, $country, $city, $category, $address)
	{
		$c = &get_instance();
		$c->load->database();

		$result = $c->db->query("INSERT INTO `Products` ( `productname`, `description`,`price`, `currency`, `inventory`, `country` ,  `city` , `category` , `address` ) VALUES ('$productname', '$description' ,'$price', '$currency', '$inventory', '$country' , '$city', '$category', '$address')");
		$inserted_id = $c->db->insert_id();

		// $result1 = $c->db->query("INSERT INTO `Necklaces` (`productid`, `productname`, `description`,`price`, `currency`, `inventory`, `category`)  VALUES ('$inserted_id', '$productname', '$description' ,'$price', '$currency', '$inventory',  '$category') WHERE $category='Necklaces'");

		$_SESSION["idproduct"]= $inserted_id;
		
		if($result){
			// $inserted_id = $c->db->insert_id();
			return array("statusCode"=>200);

			}
		else{
		return array("statusCode"=>201);

		}
		

	}


	// public static function upload($image)
	// {
	// 	$c = &get_instance();
	// 	$c->load->database();

	// 	$result = $c->db->query("INSERT INTO `Products` (`url`) VALUES ( '$image')");
	// 	if($result){
	// 		return array("statusCode"=>200);
	// 		}
	// 	else{
	// 	return array("statusCode"=>201);

	// 	}
		

	
	public function upload($image,$id) {
		$c = &get_instance();
			$c->load->database();
	
			$result = $c->db->query("UPDATE `Products` SET  url='$image' WHERE id='$id' ");

			if($result){
				return array("statusCode"=>200);
				}
			else{
			return array("statusCode"=>201);
	
			}
	 }

	 public function productitems() {
			
		$c = &get_instance();
		$c->load->database();
		// $c->db->limit($limit);
		// $c->db->offset($offset);
		$products=[];
		$result = $c->db->query("SELECT * FROM `Products` ORDER BY `id` DESC");
		$total=$result->num_rows();
		if($total>0){
			foreach ($result->result() as $row)
		{

		
			$product = new Products_model();
		
			$product->id = $row->id;
			$product->productname=$row->productname;
			$product->url=$row->url;
			$product->description=$row->description;
			$product->price=$row->price;
			$product->currency=$row->currency;
			$product->inventory=$row->inventory;
			$product->category=$row->category;
			$product->status=$row->status;
			$product->datetime=$row->datetime;
			$product->city=$row->city;
			$product->country=$row->country;
			$product->address=$row->address;


			
			$products[] = $product;
           
		
		}
	}
	return $products;

	}
	public function view($id) {
		$c = &get_instance();
			$c->load->database();
	
			$result = $c->db->query("SELECT * FROM `Products` WHERE id='$id' ");

			if($result){
				$_SESSION["id"]=$id;
				return array("statusCode"=>200);
				}
			else{
			return array("statusCode"=>201);
	
			}
	 }
	 
	 public function productitemsview($id) {
			
		$c = &get_instance();
		$c->load->database();
		// $c->db->limit($limit);
		// $c->db->offset($offset);
		$products=[];
		$result = $c->db->query("SELECT * FROM `Products` WHERE id='$id'");
		$total=$result->num_rows();
		if($total>0){
			foreach ($result->result() as $row)
		{

		
			$product = new Products_model();
		
			$product->id = $row->id;
			$product->productname=$row->productname;
			$product->url=$row->url;
			$product->description=$row->description;
			$product->price=$row->price;
			$product->currency=$row->currency;
			$product->inventory=$row->inventory;
			$product->category=$row->category;
			$product->status=$row->status;
			$product->datetime=$row->datetime;
			$product->city=$row->city;
			$product->country=$row->country;
			$product->address=$row->address;


			
			$products[] = $product;
           
		
		}
	}
	return $products;

	}


	public function buy($id) {
		$c = &get_instance();
			$c->load->database();
	
			$result = $c->db->query("SELECT * FROM `Products` WHERE id='$id' ");

			if($result){
				$_SESSION["id"]=$id;
				return array("statusCode"=>200);
				}
			else{
			return array("statusCode"=>201);
	
			}
	 }

	 public static function saveuserbuy($name, $lname, $username ,$email, $phonenumber, $password, $city, $country,$address, $productid, $category)
	 {
		  
		$c = &get_instance();
		$c->load->database();

		$result = $c->db->query("INSERT INTO `usersb` (`name`, `lname`, `username` ,`email`, `phonenumber`, `password`, `city`, `country`,`address`, `productid`, `category` ) VALUES ('$name', '$lname', '$username' ,'$email', '$phonenumber', '$password', '$city', '$country','$address', '$productid', '$category')");
		$inserted_id = $c->db->insert_id();


		$_SESSION["iduser"]= $inserted_id;
		
		if($result){
			return array("statusCode"=>200);

			}
		else{
		return array("statusCode"=>201);

		}
  
	 }

}
