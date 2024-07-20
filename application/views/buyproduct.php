
<div class="container">
	<form action="" id="App" class="row d-flex justify-content-center m-5" >
		
	<div class="row bg-dark w-100 h-100 p-3" style="--bs-bg-opacity: .2" v-for="product in products">
		<div class="d-flex justify-content-center">
		<h4 >سبد خرید</h4>

		</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img :src="'<?php echo base_url('assets/uploadedimages/')?>' + product.url" alt="Product Image" class="w-100 h-100">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="card-body ">
					<h5 class="card-title h5 d-flex justify-content-end p-3 " v-html="product.productname"></h5>
					<p class="card-text h6 d-flex justify-content-end p-3 text-dark" style="font-size:15px; text-align: justify;text-justify: inter-word;text-align: center;" v-html="product.description"></p>
					<ul class="list-group list-group-flush mb-5">
						<div class="d-flex justify-content-end">
							
							<li class="list-group d-inline-flex justify-content-end  border-0 p-3"  style="--bs-bg-opacity: .2;background-color:none" v-html="product.price"></li>	
							<li class="list-group d-inline-flex justify-content-end  border-0 p-3"  style="--bs-bg-opacity: .2;background-color:none" v-html="product.currency"></li>
							<h7 class="d-inline-flex p-3">:قیمت</h7>
						</div>
						<div class="d-flex justify-content-end">
							<li class="list-group  d-inline-flex border-0 p-3"  style="--bs-bg-opacity: .2;" v-html="product.category"></li>
							<h7 class="d-inline-flex p-3" >:دسته‌بندی</h7>
						</div>
						<div class="d-flex justify-content-end" >
							<li class="list-group d-inline-flex border-0 p-3"  style="--bs-bg-opacity: .2;" v-html="product.inventory"></li>
							<h7 class="d-inline-flex p-3">:موجودی</h7>
						</div>
				
					</ul>	
				
				</div>
			</div>
		</div>

		<div class="row form-group p-1 w-100 d-flex justify-content-center bg-dark" style="--bs-bg-opacity: .2">
											<div class="row p-1 w-100 justify-content-center">
								<input v-model="name" type="name" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 rounded  p-2 m-1 border-0 " id="exampleInputname" aria-describedby="nameHelp" placeholder="Enter Name">
								<input v-model="lname" type="lname" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 rounded  p-2 m-1 border-0" id="exampleInputlname" aria-describedby="lnameHelp" placeholder="Enter Last Name">
							</div>
						<!-- <div class="row form-group pt-3 m-1   w-100">
							<input v-model="lname" type="lname" class="col form-control p-2" id="exampleInputlname" aria-describedby="lnameHelp" placeholder="Enter Last Name">
						</div> -->
						<div class="row form-group p-1 w-100 justify-content-center">
							<input v-model="username" type="username" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 rounded p-2 m-1 border-0 " id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Enter UserName">
							<input v-model="email" type="email" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 rounded p-2 m-1 border-0" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Enter Email">
						</div>
						<!-- <div class="row form-group pt-3 m-1   w-100">
							<input v-model="email" type="email" class="col form-control p-2" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Enter Email">
						</div> -->
						<div class="row form-group p-1 w-100 justify-content-center">
							<input v-model="phonenumber" type="phonenumber" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 rounded p-2 m-1 border-0" id="exampleInputphonenumber" aria-describedby="phonenumberHelp" placeholder="Enter Phone Number">
							<input v-model="password" type="password" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 rounded p-2 m-1 border-0" id="exampleInputPassword1" placeholder="Password">
						</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " >

											<select v-model="country" class="bg-light text-dark w-100  rounded p-2 m-1">
												<option disabled value="1">Choose Country</option>
												<option value="Iran">Iran</option>
												
						</select>

					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " >
						<select v-model="city" class="bg-light text-dark w-100 rounded p-2 m-1">
							<option disabled value="2">Choose City</option>
							<option value="Tabriz">Tabriz</option>
							<option value="Tehran">Tehran</option>
						</select>

					</div>


					<div class="row form-group p-1 w-100 justify-content-center ">
					<label for="inputAddress" class="d-flex justify-content-start col-lg-12 col-md-12 col-sm-12 col-xs-12">Address :</label>
					<input type="text" v-model="address" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rounded p-2 m-1 border-0" id="inputAddress" placeholder="ولیعصر، توانیر شمالی ، بعثت ،.... ">
				</div>
				<a href="#" class="btn btn-primary d-flex justify-content-center p-2"  @click="Buy()">Buy</a>
				</div>

				
	</form>
</div>


<script>
	Vue.createApp({
	data(){
		return{
			products:[],
			id:'<?php echo $id?>',
			name:'',
			lname:'',
			username:'',
			email:'',
			phonenumber:'',
			password:'',
			city:'',
			country:'',
			address:'',
			productid:'', 
			country:'1',
			city:'2',
			category:'',
			
		

			
		}
	},
	mounted(){
		this.getlist()

	},

  	methods:{
		getlist(){
				let url = "<?php echo $PATH?>Shop/Searchviewproducts"
				$.ajax({
								url:url,
								type:'POST',
								data:{
									id:this.id,
								},
								success:(res)=>{
									console.log();
										var data = JSON.parse(res);
										this.products=data;
								
								}
						})
				
			},
			Buy(){
				    console.log(this.id);
					let url="<?php echo $PATH?>Shop/saveuserbuy";
					$.ajax({
						url:url,
						type:'POST',
						data:{
							name:this.name,
							lname:this.lname,
							username:this.username,
							email:this.email,
							phonenumber:this.phonenumber,
							password:this.password,
							city:this.city,
							country:this.country,
							address:this.address,
							productid:this.id, 
							category:this.category,

						},
						success:(dataResult)=>{
							var data = JSON.parse(dataResult);
							if(data.statusCode==200){
								location.href="<?php echo $PATH?>Shop/zarinpal";
												
							}
							else if(data.statusCode==201){
								Swal.fire("wrong!");

							}
							
						},
					
					})
				},



	}
}).mount('#App');
    
	</script>
