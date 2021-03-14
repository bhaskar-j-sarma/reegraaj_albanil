<?php
    include('header_top.php');
?>
<?php 
    include_once("classes/fetch-data.php");
    $image_list=new fetch_data();
    $get_id = $_GET['id'];

?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>View Architects</h3> 
                    <button type="button" id="delete_images" class="btn btn-danger">Delete Architects</button>    
                    <a href="add_architect.php?g_id=<?php echo $get_id; ?>" class="btn btn-info" role="button">Add Architects</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        	<div class="hpanel">               	
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered able-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 13px;">
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                            <?php
                            $get_id = $_GET['id'];
                            $sql=$image_list->get_architects($get_id);
                            $c = 0;
                            while($row=mysqli_fetch_array($sql))
                            {
                            ?>
                            <tr>
                            <td><input class="checkbox" type="checkbox" name="id[]" id="<?php echo $row['	image_id'] ?>"></td>
                            <td><?php echo ++$c; ?></td>
                            <td><?php echo $row['architect_name'] ?></td>  
                            <td><?php echo $row['architect_message'] ?></td>                      
                            <td><?php echo $row['architect_image'] ?></td>                      
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>             	
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('footer.php');
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('table').DataTable();
	});
</script>
<script>
    $(document).ready(function(){
      $('#checkAll').click(function(){
        if(this.checked){
          $('.checkbox').each(function(){
            this.checked = true;
          });
        }else{
          $('.checkbox').each(function(){
            this.checked = false;
          });
        }
      });
    });
    $('#delete_images').click(function(){
      var dataArr = new Array();
      if($('input:checkbox:checked').length > 0){
        $('input:checkbox:checked').each(function(){
          dataArr.push($(this).attr('id'));
        });
        sendApprovel(dataArr)
      }else{
        alert('No record selected');
      }
    });
    function sendApprovel(dataArr){
      $.ajax({
        type    : 'post',
        url     : 'webservices/ajax_images_deleted.php',
        data    : {'data' : dataArr},
        success : function(response){
                    location.reload();
                  },
        error   : function(errResponse){
                    alert(errResponse);
                  }
      });
    }
</script>