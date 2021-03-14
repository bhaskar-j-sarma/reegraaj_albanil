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

    

    $(".main-image #blogs_main_image").change(function(){
        readURL(this);
    });

    $(".main-image #removePhoto").click(function(){
        $('.main-image #uploadImg').attr('src', 'blogs_images/default_blogs.jpg');
        e=$('#blogs_main_image');
        e.wrap('<form>').parent('form').trigger('reset');
        e.unwrap();
    });

    $('.main-image .overlay').click(function(){
        $('.main-image #blogs_main_image').trigger('click');
    });

    $('#add_blogs').click(function(){
        var project_name = document.forms["blogsFormData"]["project_name"].value;
        var project_category = document.forms["blogsFormData"]["project_category"].value;
        var project_quote = document.forms["blogsFormData"]["project_quote"].value;
        var description = CKEDITOR.instances.description.getData()
        

        var flag = validateFields(project_name,project_category, project_quote,description);

        if(flag == false){            
            return false;
        }

        var formData = new FormData($('#blogsFormData')[0]);
        formData.append('blogs_main_image', $("#blogs_main_image")[0].files[0]);
        formData.append('action', 'add_blogs');
        formData.append('project_category', project_category);
        formData.append('project_quote', project_quote);
        formData.append('description', description);

        var project_name = $('#project_name').val();
        $.ajax({
            type: "POST",
            url:"webservices/ajax_add_products.php",
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
                    alert('blogs Successfully Added!');
                    location.reload();
                }else if(data == 0){
                    //toastr.danger('Member Not Added!');
                    alert('blogs Not Added!');
                }else if(data == 2){
                    alert('"'+title+'" blogs is already added!');
                }else if(data == 4){
                    alert('Pleae select Image!');
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

function validateFields(project_name, project_category, project_quote, description){
    if (project_name == null || project_name == "") {
        alert("Project Name must be filled out");
        return false;
    }
    if (project_category == null || project_category == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (project_quote == null || project_quote == "") {
        alert("Brand Name must be filled out");
        return false;
    }
   // if (price == null || price == "") {
      //  alert("Price Name must be filled out");
       // return false;
   // }
    if (description == null || description == "") {
        alert("Description must be filled out");
        return false;
    }

  
    return true;
}