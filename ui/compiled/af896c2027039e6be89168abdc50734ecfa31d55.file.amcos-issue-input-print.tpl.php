<?php /* Smarty version Smarty-3.1.13, created on 2022-11-21 09:55:29
         compiled from "ui/theme/default/amcos-issue-input-print.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1395605278631fed3bf1a230-33057115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af896c2027039e6be89168abdc50734ecfa31d55' => 
    array (
      0 => 'ui/theme/default/amcos-issue-input-print.tpl',
      1 => 1668927124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1395605278631fed3bf1a230-33057115',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631fed3c023b91_81907076',
  'variables' => 
  array (
    'notify' => 0,
    '_c' => 0,
    'farmer' => 0,
    'ref_id' => 0,
    'd' => 0,
    'cs' => 0,
    'inu' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631fed3c023b91_81907076')) {function content_631fed3c023b91_81907076($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Farmer Input Preview</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body" style="background:white;">
<style>
	#page-wrap { width: 100%; margin: 0 auto; }
	#header { text-align: center; position: relative; color: black; font: bold 15px Helvetica, Sans-Serif;  margin-top: 10px; margin-bottom: 10px;}

	#address { width: 300px; float: left; }
	#logo { text-align: right; float: right; position: relative; margin-top: 15px; border: 5px solid #fff; overflow: hidden; }

	#customers
	{
		font-family: Helvetica, sans-serif;
		width:100%;
		border-collapse:collapse;
	}
	#customers td, #customers th
	{
		font-size:0.8em;
		border:1px solid #98bf21;
		padding:3px 5px 2px 5px;
	}
	#customers th
	{
		font-size:0.8em;
		text-align:left;
		padding-top:5px;
		padding-bottom:4px;
		background-color:#A7C942;
		color:#fff;
	}
	#customers tr.alt td
	{
		color:#000;
		background-color:#EAF2D3;
	}
</style>
<div style="width: 80%;">
<div id="page-wrap">
	<div id="address">
		<h3><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</h3>
		<?php echo $_smarty_tpl->tpl_vars['_c']->value['address'];?>
<br>
		Tel : <?php echo $_smarty_tpl->tpl_vars['_c']->value['phone'];?>
<br>
	</div>
	<div id="logo">
	                Time : <?php echo date('Y-m-d H:i:s');?>
<br>
					Farmer Name : <?php echo $_smarty_tpl->tpl_vars['farmer']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['farmer']->value->lastname;?>
<br>
					Contact : <?php echo $_smarty_tpl->tpl_vars['farmer']->value->phonenumber;?>
<br>
	</div>

</div>

<div id="header">REF  # : REF-<?php echo $_smarty_tpl->tpl_vars['ref_id']->value;?>
</div>
<table id="customers">

	<tr>
		<th class="service">INPUT NAME</th>
		<th class="service">Unit</th>
		<th class="desc">QTY</th>


	</tr>

<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
	<tr>
		<td class="service">
		<?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['cs']->value['input_id']), null, 0);?>
		<?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>
</td>
		<td class="desc"><?php echo $_smarty_tpl->tpl_vars['inu']->value->unit;?>
</td>
		<td class="desc"><?php echo $_smarty_tpl->tpl_vars['cs']->value['input_qty'];?>
</td>
	</tr>
<?php ob_start();?><?php } ?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
	
</table>

<div id="header"><?php echo $_smarty_tpl->tpl_vars['body']->value;?>
</div>
</div>
<br><br><br>
<script type="text/javascript">
	var s5_taf_parent = window.location;
	function popup_print() {
		window.open('print.php?page=<<?php ?>?php echo $_GET['act'];?<?php ?>>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left=50,top=50,titlebar=yes')
	}
</script>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>