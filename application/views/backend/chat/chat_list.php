<?php 
$this->load->helper('common');
 ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/chat/chat.css">
<style>
.circle {
    display: inline-block;
    width: 7px;
    height: 7px;
    border-radius: 500px;
    margin: 0 .5em;
    background-color: #ddd;
    vertical-align: baseline;
    border: 2px solid transparent;
}
.circle-success{
    background: #1ed51e;
}
.circle-warning{
    background: red;
}
.media-box-object {
    display: block;
}
.thumb48 {
    width: 38px !important;
    height: 38px !important;
}
.media-box-body {
    margin-top: 8px;
    display: inline-block;
}
.img-circle {
    border-radius: 50%;
}
img {
    vertical-align: middle;
}
img {
    border: 0;
}
.media-box > .pull-left {
    margin-right: 10px;
}
.pull-left {
    float: left !important;
}
.media-box > .pull-right {
    margin-left: 10px;
    margin-top: 8px;
    display: inline-block;
}
.pull-right {
    float: right !important;
}
.media-box, .media-box-body {
    overflow: hidden;
    zoom: 1;
}

</style>
 
<?php
$frontend = $this->uri->segment(1);
$mid = my_id();
if (!empty($mid) && $frontend != 'frontend') { ?>
    <div class="chat_frame">
        
   <!--      <button type="button" style="padding: 0 10px !important;" class="btn btn-round custom-bg" id="open_chat_list"><span
                class="fa fa-comments"></span></button> -->
        <div class="panel b0" id="chat_list">
            <div class="panel-heading custom-bg">
                <div class="">
                   Users List
                    <div class="pull-right chat-icon">
                        <i data-toggle="tooltip" data-placement="top" title="<?= 'close' ?>" id="close_chat_list"
                           class="fa fa-times"
                           aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <ul class="nav b bt0">
                <li>
                    <?php
                    $users = get_online_users();
                   
                    if (!empty($users)) {
                        foreach ($users as $v_user) {
                            
                                    ?>
                                    <!-- START User status-->
                                    <a href="#" data-user_id="<?= $v_user->id ?>"
                                       class="media-box p pb-sm pt-sm bb mt0 start_chat">
                                   <?php
                                        if ($v_user->active_status == '1') {
                                            ?>
                                            <span class="pull-right"><span class="circle circle-success circle-lg"></span>
                                            </span>
                                        <?php } else { ?>
                                            <span class="pull-right"><span class="circle circle-warning circle-lg"></span>
                                            </span>
                                        <?php } ?>
                                    <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img
                                     src="<?php if(!empty($v_user->profile_image)){ ?><?= base_url() ?>uploads/agent_profile_pic/<?= $v_user->id ?>/<?= 'thumb_'.$v_user->profile_image?> <?php }else{ ?>
                                    <?= base_url() ?>skin/images/dash/no-avatar.jpg ?>/<?= 'thumb_'.$v_user->profile_image?>
                                    <?php } ?>"
                                     alt="" class="media-box-object img-circle thumb48">
                              </span>
                                       
                                        <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong class="text-sm"><?php echo $v_user->First_Name." ".$v_user->Last_Name; ?></strong>
                                    <br>
                                    <small class="text-muted">
                                        <span class="pull-left">
                                        </span>
                                        
                                    </small>
                                 </span>
                              </span>
                                    </a>
                                    <?php
                                }
                            }
                        ?>
                </li>
            </ul>
        </div>
        <div id="chat_box"></div>
        <audio id="chat-tune" controls="">
            <source src="<?= base_url() ?>assets/chat/chat_tune.mp3" type="audio/mpeg">
        </audio>
    </div>
    <!--End live_chat_section-->
<?php } ?>
