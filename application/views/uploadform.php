<!-- <form id="App">

<input type="file" name="userfile" size="20"  />

<br /><br />

<button type="submit" value="Upload" @click="upload()"></button>

</form>

<script>
		Vue.createApp({
			data(){
				return{
	
				}
			},

			methods:{
	
				upload(){
					let url="<?php echo $PATH?>Shop/do_upload";
					$.ajax({
						url:url,
						type:'POST',
						data:{
			},
						success:(dataResult)=>{
							var data = JSON.parse(dataResult);
							if(data.statusCode==200){
								Swal.fire("success");
												
							}
							else if(data.statusCode==201){
								Swal.fire("failed");

							}
							
						},
					
					})
				},

			}
		}).mount('#App');
    
	</script> -->



<!-- 



<form id="uploadForm"  action="<?php echo base_url('Shop/do_upload'); ?>"  method="post" enctype="multipart/form-data">
    <input type="file" name="userfile" size="20" />
    <br /><br />
    <button type="submit">Upload</button>
</form>

<script>
    Vue.createApp({
        methods: {
            upload() {

	
                let form = document.getElementById('uploadForm');
                let formData = new FormData(form);

                let url = "<?php echo $PATH ?>Shop/do_upload";
                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.statusCode == 200) {
                        Swal.fire("Success");
                    } else {
                        Swal.fire("Failed");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire("Failed");
                });
            }
        }
    }).mount('#uploadForm');
</script> -->




<?php echo form_open_multipart('index.php/Shop/do_upload');?>



<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload"  />

</form>


