<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Tour Services</span>
                        <?php 
                        $servicesMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Services');
                        if($servicesMenu[0]->create!=0) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/newservice" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="serviceTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Country</th> 
                                        <th>City</th>
                                        <th>Nearby Places</th>
                                        <th>Duration</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var serviceTable = $('#serviceTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/tour/service_details_list/',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
});
function deleteservicefun(id) {
        deletepopupfun("delete_service",id);
    }
    function commonDelete() {
      $.ajax({
        dataType: 'json',
        type: "POST",
        url: $("#delete_form").attr("action"),
        data: $("#delete_form").serialize(),
        cache: false,
        success: function (response) {
            addToast(response.error,response.color);
            close_delete_modal();
            var serviceTable = $('#serviceTable').dataTable({
                "bDestroy": true,
                "ajax": {
                    url : base_url+'/backend/tour/service_details_list/',
                    type : 'GET'
                },
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            }
          });
        }
      });
    }
</script>
<?php init_tail(); ?>

