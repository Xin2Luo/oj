<?php if (!defined('THINK_PATH')) exit(); $result_state=array( 0=>array(0=>"Pending",1=>"#0066CC"), 1=>array(0=>"Pending Rejudge",1=>"#0066CC"), 2=>array(0=>"Compiling",1=>"#0066CC"), 3=>array(0=>"Running",1=>"#0066CC"), 4=>array(0=>"Accepted",1=>"#468847"), 5=>array(0=>"Presentation Error",1=>"#b94a48"), 6=>array(0=>"Wrong Answer",1=>"#b94a48"), 7=>array(0=>"Time Limit Exceeded",1=>"#b94a48"), 8=>array(0=>"Memory Limit Exceeded",1=>"#b94a48"), 9=>array(0=>"Output Limit Exceeded",1=>"#b94a48"), 10=>array(0=>"Runtime Error",1=>"#2a6496"), 11=>array(0=>"Compile Error",1=>"#2a6496") ); $language_state=array( 0=>"C", 1=>"C++", 2=>"Java" ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/Top.css" />
<script src="__PUBLIC__/Js/jquery-1.11.1.min.js"></script>
<script src="__PUBLIC__/Js/bootstrap.min.js"></script>
<script src="__PUBLIC__/Js/Top.js"></script>
<script>
	var verifyUrl="<?php echo U('Index/Index/verify','','');?>";
	var RegistUrl="<?php echo U('Index/Index/Register','','');?>";
	var LoginUrl="<?php echo U('Index/Index/Login','','');?>";
	var Checkname="<?php echo U('Index/Index/Checkvalue','','');?>";
</script>
<title>Contest</title>
</head>
<body>
	<div id="topba" class="container">
	<ul class="nav nav-pills" role="tablist" id="topmenu">
	<li role="presentation"><a href="<?php echo U('Index/Index/RecentNews','','');?>">RecentsNews</a></li>
    <li role="presentation"><a href="#">Step-By-Step</a></li>
  	<li role="presentation"><a href="#">Download</a></li>
  	<li role="presentation"><a href="<?php echo U('Index/Index/Ranklist','','');?>">Ranklist</a></li>
  	<li role="presentation"><a href="#">FA.Qs</a></li>
  	<li role="presentation"><a href="#">BBS</a></li>
  	<li role="presentation"<?php if(isset($_SESSION['username'])==false){ echo 'onclick="Userclick()"';}?>><a <?php if(isset($_SESSION['username'])==true) echo 'href="'.U('Index/Index/User','','').'?user='.$_SESSION['uid'].'"';?>>User</a></li>
  	<li>
  	<?php
 if(isset($_SESSION['username'])==false){ echo '<button type="button" class="btn" id="signin">Sign In...</button>'; } else{ echo '<span id="welcome"><span id="signname"><a href="'.U('Index/Index/User','','').'?user='.$_SESSION['uid'].'">'.$_SESSION['username'].'</a></span><a id="loginout" href="#" style="padding-left:30px;">Sign Out</a></span>'; } ?>
  	</li>
  	
	</ul>
	</div>
	<div id="loginbar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm ">
	    <div class="modal-content loginbar">
	    	<div class="loginba">Login<span aria-hidden="true" id="close" data-dismiss="modal" ><img src="__PUBLIC__/Image/LoginRegist/X.png"></span></div>
		    
		    <div id="loginform">
				<div class="input-group formfirst">
				  <span class="input-group-addon">Name:</span>
				  <input type="text" class="form-control must" id="loginuname" placeholder="Please enter username">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Password:</span>
				  <input type="password" class="form-control must" id="loginpwd" placeholder="Please enter password">
				</div>
			</div>
			<div class="loginline"></div>
			<div class="btns">
				<button type="button" class="btn" id="loginBtn">Login</button>
				<button type="button" class="btn" id="registBtn" >Regist</button>
			</div>
	  </div>
	</div>
	</div>
	<div id="Registbar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content Regist-Content">
	    	<div class="registba">Regist<span aria-hidden="true" id="Xclose" data-dismiss="modal" ><img src="__PUBLIC__/Image/LoginRegist/X.png"></span></div>
		    <div id="Registform">
				<div class="input-group formfirst">
				  <span class="input-group-addon">Name:</span>
				  <input type="text" class="form-control must" id="rgname" placeholder="Please enter username" data-container="body" data-tigger="focus" data-toggle="popover" data-placement="right" data-content="用户名只由字母、数字、下划线构成的长度6-30">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Password:</span>
				  <input type="password" class="form-control must" id="rgpwd" placeholder="Please enter password">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Confirm Password:</span>
				  <input type="password" class="form-control must" id="rgrepwd" placeholder="Please confirm password">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">E-mail:</span>
				  <input type="text" class="form-control must" id="rgemail" placeholder="Please enter Email">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Verify:</span>
				  <input type="text" class="form-control must" id="rgverify">
				  <img src=<?php echo '"'.U('Index/Index/verify','','').'"';?> id="verify_code"/>
				</div>
			</div>
			
			<div class="loginline"></div>
			<div class="btns">
				<button type="button" class="btn" id="registedBtn">Regist</button>
				<button type="button" class="btn" id="resetBtn" >Reset</button>
			</div>
	  </div>
	</div>
	</div>
	<div id="Registsuccess" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div>注册成功</div>
	    	<button type="button" class="btn">完善个人资料</button>
			<button type="button" class="btn">暂时不用</button>
	  </div>
	</div>
	</div>
	<div class="container">
	<a id="Brand" href="<?php echo U('Index/Index/index','','');?>">
		<div id="cdoj">CDOJ</div>
		<div id="neu">Neusoft University</div>
	</a>
		<div id="navi">
		<ul class="nav nav-pills">
		    <li role="presentation"><a href="<?php echo U('Index/Index/index','','');?>">Home</a></li>
		    <li role="presentation"><a href="<?php echo U('Index/Index/ProblemList','','');?>">Problems</a></li>
		    <li role="presentation" class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		    Contests<span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu" role="menu">
		    	 <li role="presentation"><a href="<?php echo U('Contest/Index/index','','');?>">School Contests</a></li>
		    	 <li role="presentation"><a href="#">Virtual Contests</a></li>
		    	 <li role="presentation"><a href="#">Recent Contests</a></li>
		    </ul>
		  	</li>
			<li role="presentation"><a href="<?php echo U('Index/Index/Status','','');?>">Status</a></li>
		</ul>
		</div>
	</div>
	

        <script type="text/javascript" src="__PUBLIC__/Plug/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
        <script type="text/javascript" src="__PUBLIC__/Plug/syntaxhighlighter_3.0.83/scripts/shBrushCpp.js"></script>
        <script type="text/javascript" src="__PUBLIC__/Plug/syntaxhighlighter_3.0.83/scripts/shBrushJava.js"></script>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/Plug/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/Plug/syntaxhighlighter_3.0.83/styles/shThemeDefault.css"/>

        <div id="contest_bar" style="width: 100%;margin: 0 auto;height: 200px;background: #434343;padding-top: 20px;">
            <div id="title-info">
                <div id="contest-name" style="">
                    <h1 class="contestname"><?php echo ($contestinfo[0]['name']); ?></h1>
                </div>
                <div id="time-info" style="padding: 5px 0 5px 0;">
                    <div style="text-align: center">
                        <span style="color:#4EA1F4">Current Time:</span><span style="color: #fff;" id="currenttime"></span>
                        <span style="color:#4EA1F4">Start Time:</span><span style="color: #fff"><?php echo ($contestinfo[0]['start_time']); ?></span>
                        <span style="color:#4EA1F4">End Time:</span><span style="color: #fff"><?php echo ($contestinfo[0]['end_time']); ?></span>
                        <span style="color:#4EA1F4">Contest Status:</span><span style="color: #00ff21"><?php echo ($contestinfo[0]['sta']); ?></span>
                    </div>
                </div>
                <div class="progress" style="width: 80%;margin: 0 auto;height: 40px;border-radius: 40px;">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" id="processbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="">
                </div>
                </div>
            </div>
        </div>
        <div id="contest-info" style="width: 80%;height: 500px;background: #e0dede; left:50%;margin-left: -40%; border-radius: 20px 20px 0 0;position: absolute;top: 150px">
            <ul class="nav nav-tabs " role="tablist" style="margin: 5px 0 0 5px;">
              <li role="presentation" class=""><a href='<?php echo U("Index/Problemlist","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Overview</a></li>
              <li role="presentation" class=""><a href='<?php echo U("Index/Report","","");?>?pid=<?php echo ($v["newid"]); ?>&cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Report<span class="badge"></span></a></li>
              <li role="presentation" class=""><a href='<?php echo U("Index/Clarify","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Clarify</a></li>
              <li role="presentation" class=""><a href='<?php echo U("Index/Problem","","");?>?pid=A&cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Problems</a></li>
              <li role="presentation" class="active"><a href='#'>Status</a></li>
              <li role="presentation"><a href='<?php echo U("Index/Rank","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Rank</a></li>
              <li role="presentation"><a href='<?php echo U("Index/Prin","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Print</a></li>
            </ul>
            <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0; background-color: #808080">
              <div class="container-fluid" style="background-color: #808080">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="navbar-form navbar-right">
                        <nav>
                           <ul class="pagination" style="margin: 0">
                            <?php  $rear=$nowpage-1; if($nowpage==1) echo'<li class="disabled"><a href="#">&laquo;</a></li>'; else echo'<li><a href="'.U('Index/Status','','').'?p='.$rear.'">&laquo;</a></li>' ?>
                            <?php
 if($pages<=5) { for($i=1;$i<=$pages;$i++) { if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.U('Index/Status','','').'?p='.$i.'">'.$i.'</a></li>'; } } else { if($nowpage<=3) for($i=1;$i<=5;$i++) { if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.U('Index/Status','','').'?p='.$i.'">'.$i.'</a></li>'; } else if($pages-$nowpage<=2) for($i=$pages-4;$i<=$pages;$i++) { if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.U('Index/Status','','').'?p='.$i.'">'.$i.'</a></li>'; } else for($i=$nowpage-2;$i<=$nowpage+2;$i++) { if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.U('Index/Status','','').'?p='.$i.'">'.$i.'</a></li>'; } } ?>
                            <?php $front=$nowpage+1; if($nowpage>=$pages) echo'<li class="disabled"><a href="#">&raquo;</a></li>'; else echo'<li><a href="'.U('Index/Status','','').'?p='.$front.'">&raquo;</a></li>' ?>
                          </ul>
                        </nav>
                    </div>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            <table class="altrowstable" id="alternatecolor" style="width: 100%; margin: 0 auto">
            <tr>
                <th >ID</th>
                <th >User</th>
                <th >ProID</th>
                <th >Result</th>
                <th >Memory</th>
                <th >Time</th>
                <th >Language</th>
                <th >Length</th>
                <th >Submit Time</th>
            </tr>
            <?php if(is_array($solution)): foreach($solution as $key=>$v): ?><tr>
                    <td><?php echo ($v["soid"]); ?></td>
                    <td><a href="/oj/index.php/Index/Index/User?user=<?php echo ($v["uid"]); ?>"><?php echo ($v["username"]); ?></a></td>
                    <?php
 echo '<td><a href="/oj/index.php/Contest/Index/Problem?pid='.$v["newid"].'&cid='.$contestinfo[0]["cid"].'">'.$v["newid"].'</a></td>'; echo '<td style="color:'.$result_state[$v["result"]][1].'">'.$result_state[$v["result"]][0].'</td>'; if($v["result"]>=4&&$v["result"]<=9) { echo "<td>".$v["memory"]."</td>"; echo "<td>".$v["time"]."</td>"; } else echo "<td>-</td><td>-</td>"; echo '<td>'.$language_state[$v['language']].'</td>'; echo'<td><a href="javascript:showCode('.$v['soid'].','.$v['language'].')">'.$v["length"].'B</a></td>'; ?>
                    <td><?php echo ($v["create_time"]); ?></td>

                </tr><?php endforeach; endif; ?>
        </table>
        <div id="showSourceModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="cppcode"></div>
                </div>
            </div>
        </div>
        <script type="text/ecmascript">
            var start_time = "<?php echo ($contestinfo[0]['startinunix']); ?>";
            var len = "<?php echo ($contestinfo[0]['len']); ?>";
            var problemUrl = '<?php echo U("Index/Problem?cid=".$problems[0]["cid"]."&pid=".$problem[0]["newid"]);?>}';
            var countUrl ='<?php echo U("Contest/Index/Newscount", '', '');?>';
            var cid="<?php echo ($contestinfo[0]['cid']); ?>";
            var showCodeUrl="<?php echo U('Contest/Index/DisplayCode','','');?>";
        </script>
        <script type="text/javascript" src='__PUBLIC__/Js/LiSt.js'></script>
        <script type="text/javascript" src='__PUBLIC__/Js/showCode.js?1'></script>
        <script src="__PUBLIC__/Js/loop.js"></script>
        <script src="__PUBLIC__/Js/jquery-ui.min.js"></script>
        <link href="__PUBLIC__/Css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="__PUBLIC__/Css/problemlist.css" rel="stylesheet" />
    </body>
</html>