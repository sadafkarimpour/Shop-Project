<!-- Login Form -->

	<form id="App2" class="container bg-dark p-5 mt-5 text-center rounded" style="width:600px;--bs-bg-opacity: .2;">
		<div class="row m-1 p-1 w-100">
			<h3 class="col col-lg-12 col-md-12 col-sm-12 text-light" >Login Form</h3>
		</div>
		<div class="row  pt-3 m-1  w-100">
			<input v-model="email" type="Email" class="col col-lg-10 col-md-10 col-sm-10 col-xs-10 form-control p-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Enter Email">
		</div>
		<div class="row  pt-3 m-1  w-100">
			<input v-model="password" type="password" class="col col-lg-10 col-md-10 col-sm-10 col-xs-10 form-control p-2" id="exampleInputPassword1" placeholder="Password">
		</div>

		<button type="button" class="row btn btn-primary w-25 p-2 mt-3" @click="dologin()">Login</button>
		<div class="row  pt-3 m-1  w-100">
		<small id="" class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 form-text text-light">Not a Registered?</small>
		<a class="col col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $urlregister?>"><small id="" class="form-text text-primary">Click to Register!</small></a>
		</div>
	
	
	
	
	
		
	
	
	</form>

<!-- Login Form -->






<script>
Vue.createApp({
	data(){
    return{
			email:'',
			password:'',
			
		}
	},

  methods:{
	
	dologin(){
		if((this.email)!="" && (this.password)!="") {
        let url = "<?php echo $PATH ?>Shop/dologin";
        $.ajax({
          url:url,
          type:"POST",
          data:{
            email:this.email,
            password:this.password,
			
          },
          cache:false,
		  success:(dataResult)=>{
					var data = JSON.parse(dataResult);
					if(data.statusCode==200){
						location.href = "<?php echo $PATH ?>Shop/shopindex";	
										
					}
					else if(data.statusCode==201){
						Swal.fire("Invalid username or Password!");

					}
					
				}
			});
		}
		else{
      
			Swal.fire("Please fill the fields!");

     
		}
	}

  },

}).mount('#App2');

</script>
