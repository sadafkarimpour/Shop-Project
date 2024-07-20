<div class="container">
	<form action="" id="App" class="row d-flex justify-content-center m-5" >
 		<div class="row bg-dark w-100 h-100 p-3" style="--bs-bg-opacity: .2" v-for="product in products">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img :src="'<?php echo base_url('assets/uploadedimages/')?>' + product.url" alt="Product Image" class="w-100 h-100">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="card-body bg0dark">
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
					<a href="#" class="btn btn-primary d-flex justify-content-center p-2"  @click="Buy(product.id)">Buy</a>
				</div>
			</div>
		</div>
	</form>
</div>


<script>
	Vue.createApp({
	data(){
		return{
			products:[],
			id:'<?php echo $id?>',
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
		Buy($id){
				
				let url = "<?php echo $PATH ?>Shop/buy";
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
								location.href = "<?php echo $PATH ?>Shop/buyproduct";	
												
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
