<!-- Register Form -->
	<form id="App" class="container bg-dark p-3 mt-5 text-center rounded" style="width:650px;--bs-bg-opacity: .2;">
		<div class="row form-group m-1 p-1 w-100">
				<h3 class="text-light">Register Form</h3>
		</div>

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
	<!-- <div class="row form-group pt-3 m-1  w-100">
		<input v-model="password" type="password" class="col form-control p-2" id="exampleInputPassword1" placeholder="Password">
	</div> -->

	<div class="row form-group p-3 m-1  w-100 h-100">
		<select v-model="usertype" class="bg-light text-dark">
				<option disabled value="-1">Please select User Type</option>
				<option value="Admin">Admin</option>
				<option value="Seller">Seller</option>
				<option value="User">User</option>
		</select>
	</div>
	


	

	<button type="button" class="row btn btn-primary w-25 p-2 mt-3" @click="doregister()">Register</button>
	<div class="row form-group pt-3 m-1  w-100">
		<small id="" class="col col-lg-6 col-md-6 col-sm-6form-text text-light">Have you registered?</small>
		<a class="col col-lg-6 col-md-6 col-sm-6  " href="<?php echo $urlregister?>"><small id="" class="form-text text-primary">Click to Login!</small></a>
		</div>
	</form>

<!-- Register Form -->





<!-- script -->
	<script>
		Vue.createApp({
			data(){
				return{
					name:'',
					lname:'',
					username:'',
					email:'',
					phonenumber:'',
					password:'',
					usertype:'-1',

				}
			},

			methods:{
				doregister(){
					if (!(this.name)||!(this.lname)||!(this.username)||!(this.email)||!(this.phonenumber)||!(this.password)||!(this.usertype)){
						Swal.fire("Please fill the fields!");
						return;

					}
					let url="<?php echo $PATH?>Shop/doregister";
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
							usertype:this.usertype,

						},
						success:(dataResult)=>{
							var data = JSON.parse(dataResult);
							if(data.statusCode==200){
								location.href="<?php echo $PATH?>Shop/login";
												
							}
							else if(data.statusCode==201){
								Swal.fire("Email is already exist OR usertype is wrong!");

							}
							
						},
					
					})
				},

			}
		}).mount('#App');
    
	</script>



