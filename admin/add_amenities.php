<?php
    include('header_top.php'); 
    $id = $_GET['g_id']; 
?>

<script type="text/javascript" src="js/add_amenities.js"></script>
<!--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>-->
<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Add Amenities</h3>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">                
                <div class="panel-body">
                    <form id="blogsFormData"  name ="blogsFormData" enctype="multipart/form-data" method="post">
                        <div class="col-lg-12">
                            
                            <div class="form-group">
                                <label>Amenities Tittle</label>
                                <input type="text" class="form-control" id="amenities_tittle" name="amenities_tittle">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?php echo $id; ?>" id="product_id" name="product_id">
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group text-center">
                                    <input type="button" class="btn btn-success" value="Submit" id="add_blogs">
                                </div>
                            </div>
                        </div>
                   
                      
                    </form>                 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	/*$(document).ready(function() {
		$('#description').summernote({
			tabsize: 2,
			height: 200
		});
	});*/
	CKEDITOR.replace( 'description' );
</script>

<?php
    include('footer.php');
?>