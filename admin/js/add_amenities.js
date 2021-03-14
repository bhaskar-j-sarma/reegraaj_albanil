$(document).ready(function(){

	// Toastr options
    toastr.options = {
        "debug": false,
        "newestOnTop": false,
        "positionClass": "toast-top-center",
        "closeButton": true,
        "debug": false,
        "toastClass": "animated fadeInDown",
    };

    


	$('#add_blogs').click(function(){
        var product_id = document.forms["blogsFormData"]["product_id"].value;
        var amenities_tittle = document.forms["blogsFormData"]["amenities_tittle"].value;

        

        var flag = validateFields(product_id,amenities_tittle);

        if(flag == false){            
            return false;
        }

		var formData = new FormData($('#blogsFormData')[0]);
        formData.append('action', 'add_blogs');
        formData.append('amenities_tittle', amenities_tittle);

        var product_id = $('#product_id').val();
        var amenities_tittle = $('#amenities_tittle').val();

		$.ajax({
			type: "POST",
			url:"webservices/ajax_add_amenities.php",
	        data: formData,
            contentType: false,
            processData: false,
	        beforeSend:function(){
                $('.body_loader').show();
                $('.lightboxOverlay').show();
            },      
            success:function(data){
            //alert(data);   
            console.log(data); 
            //return false;        
                if(data ==1){
                    //toastr.success('Event Successfully Added!');
                    alert('Amenities Successfully Added!');
                    location.reload();
                }else if(data == 0){
                	alert('Images not Added!');
                }else if(data == 4){
                    alert('Please select Image!');
                }

            },
            complete:function(){
                $('.body_loader').hide();
                $('.lightboxOverlay').hide();
            }
		});
	});

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#uploadImg').attr('src', e.target.result);
        }            
        reader.readAsDataURL(input.files[0]);
    }
}

function validateFields(product_id){
    if (product_id == null || product_id == "") {
        alert("Product Id must be filled out");
        return false;
    }
    if (amenities_tittle == null || amenities_tittle == "") {
        alert("Amenities tittle must be filled out");
        return false;
    }
   
  
    return true;
}