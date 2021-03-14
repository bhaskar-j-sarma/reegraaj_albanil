$(function(){

    //View in table
    create_datatable();
    
    //Redirect to edit page
    $('#manage_blogs tbody').on( 'click', '.view_manage_blogs', function () {
        var id = $(this).attr('data-id'); 
        //alert(id);
        window.location = 'edit_products.php?id='+id;
    } );
    $('#manage_blogs tbody').on( 'click', '.add_image', function () {
        var id = $(this).attr('data-id'); 
        window.location = 'view_image.php?id='+id;
    } );
    $('#manage_blogs tbody').on( 'click', '.add_location', function () {
        var id = $(this).attr('data-id'); 
        window.location = 'view_location.php?id='+id;
    } );

    $('#manage_blogs tbody').on( 'click', '.add_features', function () {
        var id = $(this).attr('data-id'); 
        window.location = 'view_features.php?id='+id;
    } );
    $('#manage_blogs tbody').on( 'click', '.add_ammenities', function () {
        var id = $(this).attr('data-id'); 
        window.location = 'view_amenities.php?id='+id;
    } );
    $('#manage_blogs tbody').on( 'click', '.add_architects', function () {
        var id = $(this).attr('data-id'); 
        window.location = 'view_architects.php?id='+id;
    } );

   $(".main-image #manage_blogs_main_image").change(function(){
        readURL(this);
    });

    $(".main-image #removePhoto").click(function(){
        var h_img = $('#hidden_img_name').val();
        $('.main-image #uploadImg').attr('src', 'manage_blogs/'+h_img);
        e=$('#manage_blogs_main_image');
        e.wrap('<form>').parent('form').trigger('reset');
        e.unwrap();
    });

    $('.main-image .overlay').click(function(){
        $('.main-image #manage_blogs_main_image').trigger('click');
    });

    $('#edit_blogs').click(function(){

        var project_name = document.forms["manage_blogsFormData"]["project_name"].value;
        var project_category = document.forms["manage_blogsFormData"]["project_category"].value;
        var project_quote = document.forms["manage_blogsFormData"]["project_quote"].value;
        var description = CKEDITOR.instances.description.getData()
       /* alert(title+"  "+description);*/
        var flag = validateFields(project_name, project_category, project_quote,description);

        if(flag == false){            
            return false;
        }
    
        //formData = $('#infrastructureFormData').serialize();
        var formData = new FormData($('#manage_blogsFormData')[0]);
        formData.append('manage_blogs_main_image', $("#manage_blogs_main_image")[0].files[0]);
        formData.append('action', 'edit_manage_blogs');
        formData.append('project_name', project_name);
        formData.append('project_category', project_category);
        formData.append('project_quote', project_quote);
        formData.append('description', description);
        
        $.ajax({
            type: "POST",
            url:"webservices/ajax_manage_products.php",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.body_loader').show();
                $('.lightboxOverlay').show();
            },      
            success:function(data){    
            //alert(data);    
                if(data ==1){
                    alert("Products Successfully Updated!");
                    location.reload();
                }else{
                    alert('Products Not Updated!');
                }
            },
            complete:function(){
                $('.body_loader').hide();
                $('.lightboxOverlay').hide();
            }
        });
    });
    //Delete Blogs
    $(document).delegate('.delete_blogs', 'click', function() { 
        if (confirm("Do you really want to delete record?"))
        {
            
            var id = $(this).attr('data-id'); 
            var parent = $(this).parent().parent().parent();
            $.ajax({
                type: "POST",
                url: "webservices/ajax_manage_products.php",
                data: {
                    'id':id,
                    'action':'delete_blogs'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                    //alert(returnData);
                    if(returnData ==1){
                        alert('Products Deleted!');
                        parent.fadeOut('slow', function() {$(this).remove();});
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Products Not Deleted!');
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    //create_datatable();                    
                }
            });                
        }
    });

    //Change Status
    $(document).delegate('.blogs_status', 'click', function() { 
        if (confirm("Do you really want to change current status?"))
        {
               
            var id = $(this).attr('data-id'); 
            var status = $(this).attr('data-status');
            var parent = $(this).parent().parent().parent();

            $.ajax({
                type: "POST",
                url: "webservices/ajax_manage_products.php",
                data: {
                    'id':id,
                    'status':status,
                    'action':'blogs_status'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                    //alert(returnData);
                    if(returnData ==1){
                        alert('Status Updated!');
                        parent.fadeOut('slow', function() {$(this).remove();});
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Status Not Updated!');
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    create_datatable();                    
                }
            });                
        }
    });

});


function create_datatable(){

    $.ajax({
        url: 'webservices/ajax_manage_products.php',
        data: 'action=get_all_blogs',
        beforeSend:function(){
            $('.body_loader').show();
            $('.lightboxOverlay').show();
        },
        success:function(response){
            //alert(response);
            $('#manage_blogs_body').empty();            
            $('#manage_blogs_body').html(response);            
        },
        complete:function(){
            $("#manage_blogs").DataTable();
            $('.body_loader').hide();
            $('.lightboxOverlay').hide();
        }
    });

}

function validateFields(project_name, project_category, project_quote,description){
    if (project_name == null || project_name == "") {
        alert("Product Name must be filled out");
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
 
    if (description == null || description == "") {
        alert("Description must be filled out");
        return false;
    }

  
    return true;
}