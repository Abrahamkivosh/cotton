<?php /* Smarty version Smarty-3.1.13, created on 2022-05-27 09:25:23
         compiled from "ui/theme/default/account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1188705599627a1b64a33a65-86529527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bf4168b2c5f8275a9cfbd1d8e84145876f6d363' => 
    array (
      0 => 'ui/theme/default/account.tpl',
      1 => 1653632720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1188705599627a1b64a33a65-86529527',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_627a1b64b1be81_43464863',
  'variables' => 
  array (
    'notify' => 0,
    'listing' => 0,
    'lis' => 0,
    'pc' => 0,
    'cat_ma' => 0,
    'search' => 0,
    'seac' => 0,
    'count' => 0,
    'sea' => 0,
    'sugg_name' => 0,
    'sugg_phone' => 0,
    'sugg_address' => 0,
    't' => 0,
    'che' => 0,
    '_c' => 0,
    'c' => 0,
    'att' => 0,
    '_user' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_627a1b64b1be81_43464863')) {function content_627a1b64b1be81_43464863($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/user-header_u.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container" style="background-color: transparent;">

   <div class="row" style="background-color: transparent; ">
     

       <div class="col-lg-8 " >
           <br>

           <ul class="list-group" >

               <li class="list-group-item" >


           <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>

                   <div class="col-md-6 ">
                       <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                   </div>

           <?php }?>
                 <div id="showprogress" style="line-height: 2.5;display:none;">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       Searching.......
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
<div id="searchpro">
           <form name="myform" method="POST"  onsubmit="document.getElementById('searchpro').style.display = 'none';document.getElementById('showprogress').style.display = 'block';">
           
           <input   onchange="document.myform.sub_bb.focus();"  type="text" class="form-control"  list="browsers" autofocus name="username" style="width:100%;  background-color: white;" placeholder="Search here"   required>
         <!-- <input onchange="this.form.submit()" id="searchTextField"  type="text" class="form-control"  list="browsers" autofocus name="username" style="width:100%;  background-color: white;" placeholder="Search here"   required>
         -->

    <datalist id="browsers" >
    <?php $_smarty_tpl->tpl_vars['listing'] = new Smarty_variable(ORM::for_table('listings')->find_many(), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['lis'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lis']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listing']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lis']->key => $_smarty_tpl->tpl_vars['lis']->value){
$_smarty_tpl->tpl_vars['lis']->_loop = true;
?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['lis']->value['name'];?>
"><strong><?php echo $_smarty_tpl->tpl_vars['lis']->value['name'];?>
</strong> | <?php echo $_smarty_tpl->tpl_vars['lis']->value['contact'];?>
 | <?php echo $_smarty_tpl->tpl_vars['lis']->value['location'];?>
 |
    <?php $_smarty_tpl->tpl_vars['pc'] = new Smarty_variable(ORM::for_table('sub_category')->find_one($_smarty_tpl->tpl_vars['lis']->value['sub_category_id']), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['cat_ma'] = new Smarty_variable(ORM::for_table('main_category')->find_one($_smarty_tpl->tpl_vars['pc']->value['main_category_id']), null, 0);?>
            <?php echo $_smarty_tpl->tpl_vars['cat_ma']->value->name;?>

            |
            <?php echo $_smarty_tpl->tpl_vars['pc']->value->name;?>

                            
     </option>

    <?php } ?>
    </datalist>


 <br>
 <center>
    <button type="submit" id="submit_button" name="sub_bb" class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:purple; padding: 12px ;width: auto; font-size:14px;" >Search</button>
</center>
    </form>
    </div>
               </li>
           </ul>


       <?php if ($_smarty_tpl->tpl_vars['search']->value){?>
       <br>
       <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseRE">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white; ">Search Results</p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>

                   <div id="collapseRE" class="card-body" data-parent="#accordion" >
                       <div style="border-color: purple;">
                           <ul class="list-group" style="border-color: purple;">
                           
                            <?php  $_smarty_tpl->tpl_vars['seac'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['seac']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['seac']->key => $_smarty_tpl->tpl_vars['seac']->value){
$_smarty_tpl->tpl_vars['seac']->_loop = true;
?>
                            <div  data-toggle="collapse" href="#collapse<?php echo $_smarty_tpl->tpl_vars['seac']->value['id'];?>
">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white; ">
                                <img src="system/uploads/category.png" width="5%"/> 
                               <?php echo $_smarty_tpl->tpl_vars['seac']->value['main_category'];?>

                             <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(ORM::for_table('listings')->where('main_category',$_smarty_tpl->tpl_vars['seac']->value['main_category'])->count(), null, 0);?>
                              |<i> Directory Search Count (<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
) </i>
                               </p>
                               
                               </strong>
                               
                           </div>
                       </a>
                   </div>
                  
                   <div id="collapse<?php echo $_smarty_tpl->tpl_vars['seac']->value['id'];?>
"  class="card-title collapse" data-parent="#accordion" >
                       <div style="border-color: purple;">
                           <ul class="list-group" style="border-color: purple;">
                            <?php  $_smarty_tpl->tpl_vars['sea'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sea']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sea']->key => $_smarty_tpl->tpl_vars['sea']->value){
$_smarty_tpl->tpl_vars['sea']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['sea']->value['main_category']==$_smarty_tpl->tpl_vars['seac']->value['main_category']){?>

                            <li class="list-group-item"><strong><?php echo $_smarty_tpl->tpl_vars['sea']->value['name'];?>
</strong>  <br> 
                            <?php if ($_smarty_tpl->tpl_vars['sea']->value['contact']!="+251"){?>
                            <img src="system/uploads/phone.png" width="4%"/> <?php echo $_smarty_tpl->tpl_vars['sea']->value['contact'];?>
 
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['sea']->value['address']!=''){?>
                            <img src="system/uploads/address.png" width="4%"/> <?php echo $_smarty_tpl->tpl_vars['sea']->value['address'];?>

                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['sea']->value['location']!=''){?>
                              <img src="system/uploads/location.png" width="4%"> <?php echo $_smarty_tpl->tpl_vars['sea']->value['location'];?>
</li>
                            <?php }?>
                           <?php }?>
                            <?php } ?>
                           </ul>
                       </div>
                   </div>

                        <?php } ?>
                        </ul>
                       </div>
                </div>
               </div>
        </div>
           
       <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseRE2">
                       <a class="card-title">

                           <div style="background: purple;">
                              <strong> <p style="text-align: center; color: white;">Google Suggestion</p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>
                   <!--
                   <div id="collapseRE2" class="card-body" data-parent="#accordion" >
                       <div style="border-color: purple;">
                           <ul class="list-group" style="border-color: purple;">
                            
                            <li class="list-group-item"><strong><?php echo $_smarty_tpl->tpl_vars['sugg_name']->value;?>
</strong>  <br> 
                            <?php if ($_smarty_tpl->tpl_vars['sugg_phone']->value!=''){?>
                            <img src="system/uploads/phone.png" width="4%"/> <?php echo strip_tags($_smarty_tpl->tpl_vars['sugg_phone']->value);?>
 
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['sugg_address']->value!=''){?>
                            <img src="system/uploads/address.png" width="4%"/> <?php echo strip_tags($_smarty_tpl->tpl_vars['sugg_address']->value);?>
 
                            <?php }?>
                           
                           <br>
                            
                           </ul>
                       </div>
                   </div>
                   -->

               </div>
        </div>
        <?php }else{ ?>
        <br>
       <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseRE">
                       <a class="card-title">

                           <div style="background: purple;">
                              <strong> <p style="text-align: center; color: white; ">Search Results</p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>

               </div>
        </div>
           <br>
       <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseRE2">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white; ">Google Suggestion</p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>
                   

               </div>
        </div>
        <?php }?>     
               <br>
       <!--      
           <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseFive">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white;">My Attendance Record </p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>
                   <div id="collapseFive" class="card-body collapse" data-parent="#accordion" >

                       <ul class="list-group" style="border-color: purple;">
                           <li class="list-group-item" style="border-color: purple;">
                               <table class="mb-0 table table-hover">
                                   <tr><td>Clock In time</td><td>Working Hours</td><td>Idle Time</td><td>Date</td></tr>

                                  <?php  $_smarty_tpl->tpl_vars['che'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['che']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['che']->key => $_smarty_tpl->tpl_vars['che']->value){
$_smarty_tpl->tpl_vars['che']->_loop = true;
?>
                                   <tr><td><?php echo $_smarty_tpl->tpl_vars['che']->value['time_in'];?>
</td>
                                   <td><?php echo round($_smarty_tpl->tpl_vars['che']->value['hours']/60,2);?>
</td>
                                   <td><?php echo round($_smarty_tpl->tpl_vars['che']->value['idle_time']/60,2);?>
</td>
                                   <td><?php echo $_smarty_tpl->tpl_vars['che']->value['date'];?>
</td>
                                   </tr>
                                <?php } ?>

                               </table>
                               <br>
                               <br>
                           </li>
                       </ul>

                   </div>

               </div>
           </div>
       -->
       </div>

       <div class="col-lg-4 " >
           <br>
           <ul class="list-group" >

               <li class="list-group-item" >

                   <img src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['company_logo'];?>
" style="width:auto; height:auto; align-content: center;">
                   <br>
            <strong>Agent Name: <?php echo $_smarty_tpl->tpl_vars['c']->value['fullname'];?>
</strong> <br>      
            <strong>Clock in Time:</strong><?php echo $_smarty_tpl->tpl_vars['att']->value->time_in_e;?>
<br>
            <strong>Total working hours :</strong><?php echo round($_smarty_tpl->tpl_vars['att']->value->hours/60,2);?>
<br>
            <strong>Idle Time :</strong><?php echo round($_smarty_tpl->tpl_vars['att']->value->idle_time/60);?>
<br>
            <strong>Time Now:</strong><?php echo date('H:i:s');?>
<br>
            
               </li>
                
               
           </ul>

           <br>
           <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseOne">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white;">My profile</p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>
                   <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                       <div style="border-color: purple;">
                           <ul class="list-group" style="border-color: purple;">
                               <li class="list-group-item"><b style="color:purple">Username:</b><div style="text-align: right;line-height: 1px;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
</div></li>
                               <li class="list-group-item"><b style="color:purple">Name:</b><div style="text-align: right;line-height: 1px;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['fullname'];?>
</div></li>
                               <li class="list-group-item"><b style="color:purple">Phone</b><div style="text-align: right;line-height: 1px;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['phonenumber'];?>
</div></li>
                             <!--  <li class="list-group-item"><b style="color:purple">Email</b><div style="text-align: right;line-height: 1px;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['email'];?>
</div></li>-->
                               

                           </ul>
                       </div>
                   </div>

               </div>
           
           <br>
           <!--
           <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseTwo">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white; ">Update your profile here</p></strong>
                               <fieldset style="border-top:1px solid purple;"><fieldset>
                           </div>
                       </a>
                   </div>
                   <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >

                           <ul class="list-group" style="border-color: purple;">
                               <li class="list-group-item"  style="border-color: purple;">
                                   <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/edit-profile-post" >
                                       <table  style="width: 100%; ">
                                           <tr>

                                               <td style="border: 0px;"> Name</td> <td style="border: 0px;"><input type="text" class="form-control" style="height: auto;" placeholder="John Doe" name="fullname"/></td>
                                           </tr>
                                           <tr>
                                               <td style="border: 0px;">Email</td> <td style="border: 0px;"><input type="text" class="form-control" style="height: auto;" placeholder="me@me.com" name="address"/></td>

                                           </tr>

                                           <tr><td style="border: 0px;"></td><td style="border: 0px;"><input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" style="background: purple; padding: 8px ; color: white; width: auto; " value="Submit">
                                               </td>
                                           </tr>
                                       </table>
                                   </form>
                               </li>
                           </ul>

                   </div>

               </div>
           </div>


       
           <br>
           <div id="accordion" class="accordion"  >
               <div class="card mb-0">
                   <div  data-toggle="collapse" href="#collapseFour">
                       <a class="card-title">

                           <div style="background: purple;">
                           <strong><p style="text-align: center; color: white; ">Change your pin here</p></strong>
                           <fieldset style="border-top:1px solid purple;"><fieldset>
                   </div>
                       </a>
                   </div>
                   <div id="collapseFour" class="card-body collapse" data-parent="#accordion" >

                       <ul class="list-group" style="border-color: purple;">
                           <li class="list-group-item" style="border-color: purple;">
                               <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/change-password-post">
                                   <table  style="width: 100%; ">
                                       <tr>

                                           <td style="border: 0px;"> Old PIN</td> <td style="border: 0px;"><input type="password" class="form-control" style="height: auto;" placeholder="1234" name="password"/></td>
                                       </tr>
                                       <tr>
                                           <td style="border: 0px;">New PIN</td> <td style="border: 0px;"><input type="password" class="form-control" style="height: auto;" placeholder="7666" name="npass"/></td>

                                       </tr>
                                       <tr>
                                           <td style="border: 0px;">Confirm New PIN</td> <td style="border: 0px;"><input type="password" class="form-control" style="height: auto;" placeholder="7666" name="cnpass"/></td>

                                       </tr>

                                       <tr><td style="border: 0px;"></td><td style="border: 0px;"><input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" style="background: purple; padding: 8px ; color: white; width: auto; " value="Submit">
                                           </td>
                                       </tr>
                                   </table>
                               </form>
                           </li>
                       </ul>

                   </div>

               </div>
           </div>

       
         -->

       </div>
     
       
   

    
       
  </div>
       
       <br>
       <br>

   </div>
    </div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/user-footer_new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>