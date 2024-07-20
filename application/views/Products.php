
<div class="row d-flex justify-content-center align-items-center text-center" style=" font-size:20px; position: relative;text-align: center;color: white;">
	<!-- <div class="col col-lg-12  col-md-12 col-sm-12 col-12 bg-none w-100 h-75 bg-dark d-flex justify-content-center align-items-center text-center" > -->
	    <img  src="../../assets/pic/abstract-gold-chain-jewellery-presentation (1).jpg" alt="" style="height:400px;--bs-bg-opacity: .2;">
		<h3 class="bg-dark p-3" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);opacity:0.5 ">Products</h3>
	<!-- </div> -->
</div>

<div class="container m-5">
<form action="" id="App" class="row" >
	<div v-for="category in categories">
	<h5 class="d-flex justify-content-center " v-html="product.Necklaces"></h5>
	</div>
		<div class="card bg-dark m-4 p-1 " style="width: 15rem;--bs-bg-opacity: .2;border:none" v-for="product in products">
		<img :src="'<?php echo base_url('assets/uploadedimages/')?>' + product.url" alt="Product Image">
		<div class="card-body bg-light">
			<h5 class="card-title h6 d-flex justify-content-center " v-html="product.productname"></h5>
			<p class="card-text h6 d-flex justify-content-center" style="font-size:15px;color:dimgray; text-align: justify;text-justify: inter-word;text-align: center;" v-html="product.description"></p>
			<ul class="list-group list-group-flush">
				<div >
					<h7 class="d-inline-flex">قیمت: </h7>
					<li class="list-group-item  bg-light d-inline-flex justify-content-center  border-0"  style="--bs-bg-opacity: .2;" v-html="product.price"></li>	
					<li class="list-group-item  bg-light d-inline-flex justify-content-center  border-0"  style="--bs-bg-opacity: .2;" v-html="product.currency"></li>
				</div>
				<!-- <div>
					<h7 class="d-inline-flex">دسته‌بندی: </h7><li class="list-group-item bg-light d-inline-flex border-0"  style="--bs-bg-opacity: .2;" v-html="product.category"></li>
				</div>
				<div>
					<h7 class="d-inline-flex">موجودی: </h7><li class="list-group-item bg-light d-inline-flex border-0"  style="--bs-bg-opacity: .2;" v-html="product.inventory"></li>
				</div> -->
			</ul>	
			<a href="#" class="btn btn-primary d-flex justify-content-center " @click="view(product.id)">View</a>
		</div>
		</div>


</form>
</div>







<script>
	Vue.createApp({
	data(){
		return{
			products:[],
			id:'',
			productname:'',
			url:'',
			description:'',
			price:'',
			currency:'',
			inventory:'',
			description:'',
			country:'',
			city:'',
			category:'',
			address:'',
		

			
		}
	},
	mounted(){
		this.getlist()
		

	},

  	methods:{
		getlist(){
				let url = "<?php echo $PATH?>Shop/Searchproducts"
				$.ajax({
								url:url,
								type:'POST',
								data:{
								
								},
								success:(res)=>{
									console.log();
										var data = JSON.parse(res);
										this.products=data;
								
								}
						})
				
			},
			view($id){
				
				let url = "<?php echo $PATH ?>Shop/viewproduct";
				console.log(url);
				$.ajax({
				url:url,
				type:"POST",
				data:{
					id:$id,
				},
				cache:false,
				success:(dataResult)=>{
							var data = JSON.parse(dataResult);
							if(data.statusCode==200){
								location.href = "<?php echo $PATH ?>Shop/view";	
												
							}
							else if(data.statusCode==201){
								Swal.fire("Invalid username or Password!");

							}
							
						}
					});
			
		},
					
			
			

		}
	}).mount('#App');
    
	</script>

