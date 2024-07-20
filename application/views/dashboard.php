
<div class="row d-flex justify-content-center align-items-center text-center" style="height: 70px; font-size:20px;opacity:0.5">
	<div class="col col-lg-12  col-md-12 col-sm-12 col-12 bg-none w-100 h-75 bg-dark d-flex justify-content-center align-items-center text-center" >
		<h3 class="col col-lg-12  col-md-12 col-sm-12 col-12  text-light d-flex justify-content-start p-1" ><?php echo $usertype?> Acount</h3>
	</div>
</div>


<!-- information Form -->

<div class="container"  id="App2">
	<div class="row bg-dark rounded p-5" style="--bs-bg-opacity: .2;" >
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
			<table class="table table-hover w-100" v-for="userin in userinfo">
			<tr class="">
				<th>Name:</th>
				<td v-if="editting"> 
					<input type="text" v-model="name" class="p-1 rounded" style="background-color:unset;border:none;border-bottom: 2px blue solid" placeholder="Enter name"  >
				</td>
				<td v-html="userin.name" v-else></td>
			</tr>
			<tr class="">
				<th>Username:</th>
				<td v-if="editting"> 
					<input type="text" v-model="username"  class="p-1 rounded" style="background-color:unset;border:none;border-bottom: 2px blue solid" placeholder="Enter username"  >
				</td>
				<td v-html="userin.username" v-else></td>
			</tr>
			<tr class="">
				<th>Phone Number:</th>
				<td v-if="editting"> 
					<input type="text" v-model="phonenumber" class="p-1 rounded" style="background-color:unset;border:none;border-bottom: 2px blue solid" placeholder="Enter phonenumber"  >
				</td>
				<td v-html="userin.phonenumber" v-else></td>
			</tr>
			</table>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<table class="table table-hover w-100" v-for="userin in userinfo">
			<tr class="">
				<th>Last Name:</th>
				<td v-if="editting"> 
					<input type="text" v-model="lname" class="p-1 rounded" style="background-color:unset;border:none;border-bottom: 2px blue solid" placeholder="Enter lname"  >
				</td>
				<td  v-html="userin.lname" v-else></td>
			</tr>
			<tr class="">
				<th>Email:</th>
				<td v-if="editting"> 
					<input type="text" v-model="email" class="p-1 rounded" style="background-color:unset;border:none;border-bottom: 2px blue solid" placeholder="Enter email"  >
				</td>
				<td  v-html="userin.email" v-else></td>
			</tr>
			<tr class="">
				<th>Password:</th>
				<td v-if="editting"> 
					<input type="text" v-model="password" class="p-1 rounded" style="background-color:unset;border:none;border-bottom: 2px blue solid" placeholder="Enter password"  >
				</td>
				<td  v-html="userin.password" v-else></td>
			</tr>
			</table>
		</div>
		<button type="button" class="btn btn-primary w-25 m-1" v-for="userin in userinfo"  @click="Save(userin)" v-if="editting">Save</button>
		<button type="button" class="btn btn-secondary w-25 m-1"  @click="Return()" v-if="editting">Return</button>

		<button type="button" class="btn btn-dark w-25" v-for="userin in userinfo" @click="Edit(userin)" v-else>Edit</button>
	</div>
</div>



<!-- product Form -->



<script>
Vue.createApp({
	data(){
    return{
		id:'',
		name:'',
		lname:'',
		username:'',
		email:'',
		phonenumber:'',
		password:'',
		usertype:'',
		editting:false,
		iduser:'<?php echo $id?>',
		userinfo:[],
		}

	},
	mounted(){
		this.getlist()
	},

  	methods:{
			getlist(){
					let url = "<?php echo $PATH?>Shop/searchuser"
					$.ajax({
									url:url,
									type:'POST',
									data:{
										id:this.iduser,
									},
									success:(res)=>{
										console.log();
											var data = JSON.parse(res);
											this.userinfo=data;
									
									}
							})
					
				},
			Edit(userin){
				this.editting=true
				this.name=userin.name
				this.lname=userin.lname
				this.username=userin.username
				this.email=userin.email
				this.phonenumber=userin.phonenumber
				this.password=userin.password
			},
			Save(userin){
				let url="<?php echo $PATH?>Shop/save";
			$.ajax({
				url:url,
				type:"post",
				data:{
					id:this.iduser,
					name:this.name,
					lname:this.lname,
					username:this.username,
					email:this.email,
					phonenumber:this.phonenumber,
					password:this.password,

				},
				cache:false,
				success:(dataResult)=>{
					var data = JSON.parse(dataResult);
					if(data.statusCode==200){
						Swal.fire("Task successfuly added.");
						this.getlist();
						location.href = "<?php echo $PATH ?>Shop/shopindex";	
										
					}
					else if(daya.statusCode==201){
						Swal.fire("something went wrong!");

					}
					
				},
			})
			},
			Return(){
				this.editting=false
			}

		}
}).mount('#App2');

</script>
