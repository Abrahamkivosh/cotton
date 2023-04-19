{include file="sections/user-header_u.tpl"}

<div class="container" style="background-color: transparent;">

   <div class="row" style="background-color: transparent; ">
     

       <div class="col-lg-8 " >
           <br>

           <ul class="list-group" >

               <li class="list-group-item" >


           {if isset($notify)}

                   <div class="col-md-6 ">
                       {$notify}
                   </div>

           {/if}
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
    {$listing = ORM::for_table('listings')->find_many()}
    {foreach $listing as $lis}
    <option value="{$lis['name']}"><strong>{$lis['name']}</strong> | {$lis['contact']} | {$lis['location']} |
    {$pc = ORM::for_table('sub_category')->find_one($lis['sub_category_id'])}
    {$cat_ma = ORM::for_table('main_category')->find_one($pc['main_category_id'])}
            {$cat_ma->name}
            |
            {$pc->name}
                            
     </option>

    {/foreach}
    </datalist>


 <br>
 <center>
    <button type="submit" id="submit_button" name="sub_bb" class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:purple; padding: 12px ;width: auto; font-size:14px;" >Search</button>
</center>
    </form>
    </div>
               </li>
           </ul>


       {if $search}
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
                           
                            {foreach $search as $seac}
                            <div  data-toggle="collapse" href="#collapse{$seac['id']}">
                       <a class="card-title">

                           <div style="background: purple;">
                               <strong><p style="text-align: center; color: white; ">
                                <img src="system/uploads/category.png" width="5%"/> 
                               {$seac['main_category']}
                             {$count=ORM::for_table('listings')->where('main_category', $seac['main_category'] )->count()}
                              |<i> Directory Search Count ({$count}) </i>
                               </p>
                               
                               </strong>
                               
                           </div>
                       </a>
                   </div>
                  
                   <div id="collapse{$seac['id']}"  class="card-title collapse" data-parent="#accordion" >
                       <div style="border-color: purple;">
                           <ul class="list-group" style="border-color: purple;">
                            {foreach $search as $sea}
                            {if $sea['main_category']==$seac['main_category']}

                            <li class="list-group-item"><strong>{$sea['name']}</strong>  <br> 
                            {if $sea['contact']!="+251"}
                            <img src="system/uploads/phone.png" width="4%"/> {$sea['contact']} 
                            {/if}
                            {if $sea['address']!="" }
                            <img src="system/uploads/address.png" width="4%"/> {$sea['address']}
                            {/if}
                            {if $sea['location']!="" }
                              <img src="system/uploads/location.png" width="4%"> {$sea['location']}</li>
                            {/if}
                           {/if}
                            {/foreach}
                           </ul>
                       </div>
                   </div>

                        {/foreach}
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
                            
                            <li class="list-group-item"><strong>{$sugg_name}</strong>  <br> 
                            {if $sugg_phone!=""}
                            <img src="system/uploads/phone.png" width="4%"/> {strip_tags($sugg_phone)} 
                            {/if}
                            {if $sugg_address!=""}
                            <img src="system/uploads/address.png" width="4%"/> {strip_tags($sugg_address)} 
                            {/if}
                           
                           <br>
                            
                           </ul>
                       </div>
                   </div>
                   -->

               </div>
        </div>
        {else}
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
        {/if}     
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

                                  {foreach $t as $che}
                                   <tr><td>{$che['time_in']}</td>
                                   <td>{round($che['hours']/60,2)}</td>
                                   <td>{round($che['idle_time']/60,2)}</td>
                                   <td>{$che['date']}</td>
                                   </tr>
                                {/foreach}

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

                   <img src="{$_c['company_logo']}" style="width:auto; height:auto; align-content: center;">
                   <br>
            <strong>Agent Name: {$c['fullname']}</strong> <br>      
            <strong>Clock in Time:</strong>{$att->time_in_e}<br>
            <strong>Total working hours :</strong>{round($att->hours/60,2)}<br>
            <strong>Idle Time :</strong>{round($att->idle_time/60)}<br>
            <strong>Time Now:</strong>{date('H:i:s')}<br>
            
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
                               <li class="list-group-item"><b style="color:purple">Username:</b><div style="text-align: right;line-height: 1px;">{$_user['username']}</div></li>
                               <li class="list-group-item"><b style="color:purple">Name:</b><div style="text-align: right;line-height: 1px;">{$_user['fullname']}</div></li>
                               <li class="list-group-item"><b style="color:purple">Phone</b><div style="text-align: right;line-height: 1px;">{$_user['phonenumber']}</div></li>
                             <!--  <li class="list-group-item"><b style="color:purple">Email</b><div style="text-align: right;line-height: 1px;">{$_user['email']}</div></li>-->
                               

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
                                   <form class="form-horizontal" method="post" role="form" action="{$_url}accounts/edit-profile-post" >
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
                               <form class="form-horizontal" method="post" role="form" action="{$_url}accounts/change-password-post">
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

{include file="sections/user-footer_new.tpl"}