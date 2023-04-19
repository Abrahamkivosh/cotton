<?php /* Smarty version Smarty-3.1.13, created on 2022-05-08 22:56:05
         compiled from "ui/theme/default/reports-attendance-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92713668462782055e1c185-68171849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0d54c2db613923e4392273804261f77404cd005' => 
    array (
      0 => 'ui/theme/default/reports-attendance-view.tpl',
      1 => 1650342944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92713668462782055e1c185-68171849',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fdate' => 0,
    'tdate' => 0,
    'notify' => 0,
    'd' => 0,
    'ds' => 0,
    'pc' => 0,
    'list_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62782055e5e175_73000928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62782055e5e175_73000928')) {function content_62782055e5e175_73000928($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Agent Attendance Report
						<br>
							  Agent Attendance Report:
							[ <?php echo $_smarty_tpl->tpl_vars['fdate']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['tdate']->value;?>
]
						</div>
					</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<br>
							<div class="col-lg-12">
								<div class="main-card mb-3 card">
									<div class="card-body">

										<table class="mb-0 table table-hover">
									<thead>
										<tr>
										
                                <th class="text-center">Agent name</th>
                                <th class="text-center">Time in</th>
                                <th class="text-center">Idle time </th>
                                 <th class="text-center">Working hours</th>
                                <th class="text-center">Directory search count</th>
								 <th class="text-center">Date</th>
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                        <tr>
											                                  <td class="text-center">
                                <?php $_smarty_tpl->tpl_vars['pc'] = new Smarty_variable(ORM::for_table('agents')->find_one($_smarty_tpl->tpl_vars['ds']->value['agent_id']), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['pc']->value->fullname;?>
-
                                <?php echo $_smarty_tpl->tpl_vars['pc']->value->phonenumber;?>

                                </td>
                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['ds']->value['time_in'];?>
</td>
                                <td class="text-center"><?php echo round($_smarty_tpl->tpl_vars['ds']->value['idle_time']/60,2);?>
</td>
                                <td class="text-center"><?php echo round($_smarty_tpl->tpl_vars['ds']->value['hours']/60,2);?>
</td>
                                <td class="text-center"> <?php $_smarty_tpl->tpl_vars['list_c'] = new Smarty_variable(ORM::for_table('listing_annalysis')->where('agent_id',$_smarty_tpl->tpl_vars['ds']->value['agent_id'])->where('date',$_smarty_tpl->tpl_vars['ds']->value['date'])->sum('views'), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['list_c']->value;?>

                                </td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['date'];?>
</td>

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
			</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>