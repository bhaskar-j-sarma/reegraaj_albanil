<?php
    include('header_top.php');    
?>
<script type="text/javascript" src="js/manage_products.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Manage Products</h3>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        	<div class="hpanel">              	
                <div class="panel-body">
                    <div class="table-responsive">                	
                    <table class="table" id="manage_blogs"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
						<thead>
							<tr>							
                                <th>Sr No.</th>
                                <th>Projects Name</th>
                                <th>Project Category</th>
                                <th>Status</th>
                                <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							</tr>
						</thead>
                        <tbody id="manage_blogs_body">
                        </tbody>
					</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        //$("#manage_company").DataTable();
    });
</script>
<?php
    include('footer.php');
?>