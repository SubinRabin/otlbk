<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title"> 
                        <span>Permission</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                               <div class="form-group col-md-6">
                                   
                              </div>
                              </div>
                        </div>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi custom-switch">
                        	<form method="post" id="permission_settings_form">
                                <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['id'] ?>">
                            <table class="table table-condensed table-hover" id="agent_permission_table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>
                                          <!-- <div class="switch"> -->
                                            Inactive
                                          <!--   <label>
                                              <input type="checkbox"  id="per_check_all" name="check_all"  onchange="per_change_check_all_permission();" >
                                              <span class="lever"></span>
                                            </label>
                                          </div> -->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if (count($view1)!=0) {
                                        $permission = explode(",", $view1[0]->permission);
                                      } else{
                                        $permission = array();
                                      }
                                      foreach ($view as $key1 => $value1) {
                                        $agent_id[] = $value1->id;
                                      }
                                      $array = array_merge($agent_id,$permission);
                                      $vals = array_count_values($array);
                                   foreach ($view as $key => $value) { ?>
                                    <tr>
                                      <td><?php echo $key+1 ?></td>
                                      <td><?php echo $value->First_Name." ".$value->Last_Name ?><input type="hidden" name="per_set_id[<?php echo $key ?>]" value="<?php echo $value->id ?>"/> </td>
                                      <td>
                                        <div class="switch">
                                              <label>
                                                  <input type="checkbox" onchange="per_childs_change_check_all_permission();" name="per_set[<?php echo $key ?>]" class="per_childs"  value="<?php echo $value->id ?>" <?php echo $vals[$value->id]==2 ? "checked" : '' ?>>
                                                  <span class="lever"></span>
                                              </label>
                                        </div>
                                      </td>
                                    </tr>
                                  <?php  } ?>
                                </tbody>
                            </table>
                          </form>
                         </div>
                    </div>
                </div>
             </div>
        </div>

    </div>
</div>

<?php init_tail(); ?>