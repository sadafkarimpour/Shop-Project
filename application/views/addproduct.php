
<div class="row d-flex justify-content-center align-items-center text-center" style="height: 70px; font-size:20px;opacity:0.5">
	<div class="col col-lg-12  col-md-12 col-sm-12 col-12 bg-none w-100 h-75 bg-dark d-flex justify-content-center align-items-center text-center" >
		<h3 class="col col-lg-12  col-md-12 col-sm-12 col-12  text-light d-flex justify-content-center p-1" >Add Products Form</h3>
	</div>
</div>


<!-- <?php echo form_open_multipart('index.php/Shop/saveproduct');?>




<input type="file" name="userfile" size="20" />

<br /><br />

<input type="button" value="upload" />


</form> -->

	<form id="App2" class="container p-5 text-center" style="--bs-bg-opacity: .2;">
			<div class="row bg-dark rounded p-5" style="--bs-bg-opacity: .2;" >
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
					<div class="row p-1 w-100 justify-content-center ">
						<input v-model="productname" type="text" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rounded  p-2 m-1 border-0 " id="exampleInputproductname" aria-describedby="productnameHelp" placeholder=" Enter Product Name">
					</div>
				</div>
				<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
					<div class="row p-1 w-100 justify-content-center "> -->
							<!-- <label for="img" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Product Image:</label>
							<input type="file" name="userfile" size="20" v-model="image" class="form-control-file col-lg-8 col-md-8 col-sm-8 col-xs-8" id="img" /> -->
<!-- 
							<?php echo form_open_multipart('index.php/Shop/do_upload');?>

							<input type="file" name="userfile" size="20" />

							<br /><br />

							<input type="submit" value="upload"  /> -->

					<!-- <div v-else class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img :src="image" class="col-lg-8 col-md-8 col-sm-8 col-xs-8 m-2" style="width:25% ;height:75%" />
								<button @click="removeImage" class="btn btn-light col-lg-4 col-md-4 col-sm-4 col-xs-4">Remove image</button>
							</div>
						 -->
						
						<!-- </div>
						
				</div> -->
				<div class="row form-group p-1 w-100 justify-content-center">
						<input v-model="price" type="number"  class="col-lg-5 col-md-5 col-sm-12 col-xs-12 d-flex justify-content-start rounded p-2 m-1 border-0" id="exampleInputProductPrice" aria-describedby="ProductPriceHelp" placeholder="Enter Product Price">
						<label for="currency" class="col-lg-2 col-md-2 col-sm-12 col-xs-12">Enter currency:</label>
						<input v-model="currency" id="currency" type="text" class="col-lg-1 col-md-1 col-sm-12 col-xs-12 rounded p-2 m-1 border-0" id="exampleInputcurrency" placeholder="ریال">
						<label for="inventory" class="col-lg-2 col-md-2 col-sm-12 col-xs-12">Enter inventory:</label>
						<input v-model="inventory" id="inventory" type="number" class="col-lg-1 col-md-1 col-sm-12 col-xs-12 rounded p-2 m-1 border-0" id="exampleInputinventory" placeholder="1">
					</div>
				<div class="row form-group p-1  w-100 justify-content-center">
							<textarea v-model="description"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rounded   m-1 border-0" name="Description" id="Description"  cols="30" s="10" placeholder="Enter Description"></textarea>
				</div>

			
				<div class="row form-group p-1 w-100 d-flex justify-content-center">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " >

						<select v-model="country" class="bg-light text-dark w-100  rounded p-2 m-1">
							<option disabled value="1">Choose Country</option>
							<option value="Iran">Iran</option>
							
						</select>

					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " >
						<select v-model="city" class="bg-light text-dark w-100 rounded p-2 m-1">
							<option disabled value="2">Choose City</option>
							<option value="Tabriz">Tabriz</option>
							<option value="Tehran">Tehran</option>
						</select>

					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " >
						<select v-model="category" class="bg-light text-dark w-100  rounded p-2 m-1">
							<option disabled value="3">Choose Category</option>
							<option value="Necklaces">Necklaces</option>
							<option value="Earrings">Earrings</option>
							<option value="Bracelet">Bracelet</option>
							<option value="Ring">Ring</option>
							<option value="Sets">Sets</option>
							<option value="Resin Art">Resin_Art</option>
							
						</select>
					</div>


				</div>

				<div class="row form-group p-1 w-100 justify-content-center ">
					<label for="inputAddress" class="d-flex justify-content-start col-lg-12 col-md-12 col-sm-12 col-xs-12">Address :</label>
					<input type="text" v-model="address" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rounded p-2 m-1 border-0" id="inputAddress" placeholder="ولیعصر، توانیر شمالی ، بعثت ،.... ">
				</div>
		

		<button type="button" class="row btn btn-primary w-25 p-2 " @click="Save()">Save</button>
		
		
	</form>

<!-- product Form -->



<script>
Vue.createApp({
	data(){
    return{
			
			productname:'',
			description:'',
			price:'',
			currency:'',
			inventory:'',
			description:'',
			country:'1',
			city:'2',
			category:'3',
			address:'',
		}

	},
	// mounted(){
	// },

  	methods:{
	

			Save(){
			// if (!(this.productname)||!(this.url)||!(this.username)||!(this.description)||!(this.price)||!(this.currency)||!(this.inventory)||!(this.country)||!(this.city)||!(this.category)||!(this.address)){
			// 			Swal.fire("Please fill the fields!");
			// 			return;

			// 	}
			let url="<?php echo $PATH?>Shop/saveproduct";
			$.ajax({
				url:url,
				type:'POST',
				data:{
					productname:this.productname,
					// image:this.image,
					description:this.description,
					price:this.price,
					currency:this.currency,
					inventory:this.inventory,
					country:this.country,
					city:this.city,
					category:this.category,
					address:this.address,

				},
				success:(dataResult)=>{
					var data = JSON.parse(dataResult);
					if(data.statusCode==200){
						location.href="<?php echo $PATH?>Shop/upload";
										
					}
					else if(data.statusCode==201){
						Swal.fire("sth went wronge");

					}
					
					
				},
			
			});
		},		


		}
}).mount('#App2');

</script>
