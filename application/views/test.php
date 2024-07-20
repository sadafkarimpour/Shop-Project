
<form action="" id="App">
<button class="btn btn-primary"  v-if="save" @click="save()">Save</button>

<h1 v-else>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sunt sequi et molestias molestiae laudantium? Amet cupiditate labore ratione iste est, sed laboriosam a modi earum placeat magni totam. Ab!</h1>

</form>





<!-- script -->
<script>
		Vue.createApp({
			data(){
				return{
				
                save:false,
				}
			},

			methods:{


				saave(){
					this.save=true
				}
				// doregister(){
				// 	if (!(this.name)||!(this.lname)||!(this.username)||!(this.email)||!(this.phonenumber)||!(this.password)||!(this.usertype)){
				// 		Swal.fire("Please fill the fields!");
				// 		return;

				// 	}
				// 	let url="<?php echo $PATH?>Shop/doregister";
				// 	$.ajax({
				// 		url:url,
				// 		type:'POST',
				// 		data:{
				// 			name:this.name,
				// 			lname:this.lname,
				// 			username:this.username,
				// 			email:this.email,
				// 			phonenumber:this.phonenumber,
				// 			password:this.password,
				// 			usertype:this.usertype,

				// 		},
				// 		success:(dataResult)=>{
				// 			var data = JSON.parse(dataResult);
				// 			if(data.statusCode==200){
				// 				location.href="<?php echo $PATH?>Shop/login";
												
				// 			}
				// 			else if(data.statusCode==201){
				// 				Swal.fire("Email is already exist OR usertype is wrong!");

				// 			}
							
				// 		},
					
				// 	})
				// },

			}
		}).mount('#App');
    
	</script>
