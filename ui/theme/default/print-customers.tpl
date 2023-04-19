<!DOCTYPE html>
<html>
<head>
    <title>{$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{$_theme}/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{$_theme}/images/favicon.ico">

    <style type="text/css">
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
</head>

<body onload="window.print()">
<div class="row">
    <div class="col-md-12">
        <div id="printable">
            <h4>Customer Report by {$option}</h4>
            <table class="table table-condensed table-bordered" style="background: #ffffff">
                <tr>
                    <th>Account  </th>
                    <th>{$_L['Full_Name']}</th>
                    <th>{$_L['Phone_Number']}</th>
                    <th>Email Adress</th>
                    <th>Discount Amount</th>
                    <th>Plan</th>
                    <th>Location</th>
                    <th>Router</th>
                    <th>Status</th>
                    <th>Approval Status</th>
                </tr>
                {foreach $d as $ds}
                    {if $ty == "active"}
                        {$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

                        {if $ds['username']==$ch['username']}
                            <tr>

                                <td>{$ds['username']}</td>
                                <td>{$ds['fullname']}</td>
                                <td>{$ds['phonenumber']}</td>
                                <td>{$ds['address']}</td>
                                <td>{$ds['discount']}</td>
                                <td>{$ch['type']}:{$ch['namebp']}</td>
                                <td>{$ds['location']}</td>

                                <td>{$ds['routers']}</td>
                                <td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

                                    {if $ds['username']==$ch['username']}
                                        <label class="btn-tag btn-tag-success">Active</label>
                                    {else}
                                        <label class="btn-tag btn-tag-danger">InActive</label>
                                    {/if}
                                </td>
                                <td>{if $ds['approved']==1}
                                        Approved
                                    {else}
                                        Not Approved
                                    {/if}
                                </td>





                            </tr>
                        {/if}
                    {elseif $ty == "inactive"}

                        {$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "off")->find_one()}
                        {if $ds['username']==$ch['username']}
                            <tr>

                                <td>{$ds['username']}</td>
                                <td>{$ds['fullname']}</td>
                                <td>{$ds['phonenumber']}</td>
                                <td>{$ds['address']}</td>
                                <td>{$ds['discount']}</td>
                                <td>{$ch['type']}:{$ch['namebp']}</td>
                                <td>{$ds['location']}</td>
                                <td>{$ds['routers']}</td>
                                <td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

                                    {if $ds['username']==$ch['username']}
                                        <label class="btn-tag btn-tag-success">Active</label>
                                    {else}
                                        <label class="btn-tag btn-tag-danger">InActive</label>
                                    {/if}
                                </td>
                                <td>{if $ds['approved']==1}
                                        Approved
                                    {else}
                                        Not Approved
                                    {/if}
                                </td>





                            </tr>
                        {/if}
                    {elseif $ty == "due7"}
                        {$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"))))->find_one()}
                        {if $ds['username']==$ch['username']}
                            <tr>

                                <td>{$ds['username']}</td>
                                <td>{$ds['fullname']}</td>
                                <td>{$ds['phonenumber']}</td>
                                <td>{$ds['address']}</td>
                                <td>{$ds['discount']}</td>
                                <td>{$ch['type']}:{$ch['namebp']}</td>
                                <td>{$ds['location']}</td>
                                <td>{$ds['routers']}</td>
                                <td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

                                    {if $ds['username']==$ch['username']}
                                        <label class="btn-tag btn-tag-success">Active</label>
                                    {else}
                                        <label class="btn-tag btn-tag-danger">InActive</label>
                                    {/if}
                                </td>
                                <td>{if $ds['approved']==1}
                                        Approved
                                    {else}
                                        Not Approved
                                    {/if}
                                </td>





                            </tr>
                        {/if}
                    {elseif $ty == "due3"}

                        {$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))->find_one()}
                        {if $ds['username']==$ch['username']}
                            <tr>

                                <td>{$ds['username']}</td>
                                <td>{$ds['fullname']}</td>
                                <td>{$ds['phonenumber']}</td>
                                <td>{$ds['address']}</td>
                                <td>{$ds['discount']}</td>
                                <td>{$ch['type']}:{$ch['namebp']}</td>
                                <td>{$ds['location']}</td>
                                <td>{$ds['routers']}</td>
                                <td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

                                    {if $ds['username']==$ch['username']}
                                        <label class="btn-tag btn-tag-success">Active</label>
                                    {else}
                                        <label class="btn-tag btn-tag-danger">InActive</label>
                                    {/if}
                                </td>
                                <td>{if $ds['approved']==1}
                                        Approved
                                    {else}
                                        Not Approved
                                    {/if}
                                </td>





                            </tr>
                        {/if}
                    {else}

                        <tr>
                            <td>{$ds['username']}</td>
                            <td>{$ds['fullname']}</td>
                            <td>{$ds['phonenumber']}</td>
                            <td>{$ds['address']}</td>
                            <td>{$ds['discount']}</td>
                            <td>
                                {$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}
                                {$ch['type']}:{$ch['namebp']}</td>
                            <td>{$ds['location']}</td>
                            <td>{$ds['routers']}</td>
                            <td>

                                {if $ds['username']==$ch['username']}
                                    <label class="btn-tag btn-tag-success">Active</label>
                                {else}
                                    <label class="btn-tag btn-tag-danger">InActive</label>
                                {/if}
                            </td>
                            <td>{if $ds['approved']==1}
                                    Approved
                                {else}
                                    Not Approved
                                {/if}
                            </td>
                        </tr>
                    {/if}
                {/foreach}
            </table>

        </div>
        <button type="button" id="actprint" class="btn btn-default btn-sm no-print">{$_L['Click_Here_to_Print']}</button>
    </div>
</div>
<script src="{$_theme}/scripts/jquery-1.10.2.js"></script>
<script src="{$_theme}/scripts/bootstrap.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
<script>
    window.onload(function() {
        // initiate layout and plugins

            window.print();
            //return false;

    });
</script>

</body>
</html>