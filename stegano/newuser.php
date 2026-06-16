<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
	var xmlhttp;
		function showdet(id)
		{
			if(id.length==0)
			{
			document.getElementById('sname').innerHTML="";
			}
			if(window.ActiveXObject)
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			else
			xmlhttp=new XMLHttpRequest();
			xmlhttp.open("POST","showdet.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("val="+id);
			xmlhttp.onreadystatechange=output;
		}

		function output()
		{
			 if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{

    		f1.staffname.value=xmlhttp.responseText;
   			 }
		}
</script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head><body>
<div id="header-wrapper">
	<div id="logo">
	 <div style="position:absolute; left:358px; top:177px">
      <h3>For hiding confidentials</h3>   </div> 	 
  </div>
    
<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="#">Photos</a></li>
				<li><a href="#">About</a></li>
				<li><a href="index.php">Logout</a></li>
				</ul>
		</div>
		<!-- end #menu -->
		<div id="search">
			<form method="get" action="">
				<fieldset>
				<!--<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="Search" />-->
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
</div>
<div id="page">
	<div id="content">
		<div class="post">
<?php
	session_start();
error_reporting(E_ERROR);
	include("dbcon.php");
	$sql="select staffid from staffdet where desgn in ('Inspector-General','Inspector','Sub-Inspector') and staffid not in (select staffid from userdet)";
	$rs=mysql_query($sql);
	$staffid=array();
	$i=0;
	while($a=mysql_fetch_array($rs))
	{
		$staffid[$i]=$a[0];
		$i++;
	}
?>

<form name="f1" action="?" method="post">
	<h1><center><font color="white">New User Details</font></center></h1>

	<table border="1" align="center">
	<tr>
	<td>Staff Id:</td>
	<td><select name="staffid" onChange="showdet(this.value)">
	<option>---select---</option>
	<?php
		foreach($staffid as $t)	
		echo "<option value=".$t.">".$t."</option>";
	?>
	</select>
	</td>

	<tr>
	<td>Staff Name:</td>
	<td><input type="text" name="staffname"></td>
	</tr>

	<tr>
	<td>User Name:</td>
	<td><input type="text" name="username">@stegano.com</td>
	</tr>
	
	<tr>
	<td>Password:</td>
	<td><input type="password" name="pwd"></td>
	</tr>

	<tr>
	<td>Confirm Password:</td>
	<td><input type="password" name="cpwd"></td>
	</tr>

	<tr>
	<td>Admin Code:</td>
	<td><input type="password" name="admcode"></td>
	</tr>
	
	<tr>
	<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
	</tr>
</table>
</form>

<?php
	if(isset($_POST['submit']))
	{
		$branchname=$_SESSION['branchname'];
		//echo  "<br>Branch Name:".$branchname;
		$staffid=$_POST['staffid'];
		$staffname=$_POST['staffname'];
		$username=$_POST['username']."@stegano.com";
		$pwd=$_POST['pwd'];
		$cpwd=$_POST['cpwd'];
		$admcode=$_POST['admcode'];
		$status='Y';
		$createduser="admin";
		if($admcode=="Admin009" && $pwd==$cpwd)
		{
			$sql="insert into userdet values('$branchname',$staffid,'$staffname','$username','$pwd','$status','$createduser')";
			//echo $sql;
			if(mysql_query($sql))
			echo "<br><font color='red'>New user id created...</font>";
			/*else
			echo mysql_error();*/
		}
		else
		echo "Registration process failed...Try Again!....";		
					
	}
?>
</div>
   </div>
   <div id="sidebar">
		<ul>
			<li><br />
				    <center><img src="images/p2.jpeg" width="120"/></li></center>
			<li id="calendar">
				<h2>Calendar</h2>
				<div id="calendar_wrap">
					<table align="center" summary="Calendar">
						<caption>
						May 2013
						</caption>
						<thead>
							<tr>
								<th abbr="Monday" scope="col" title="Monday">M</th>
								<th abbr="Tuesday" scope="col" title="Tuesday">T</th>
								<th abbr="Wednesday" scope="col" title="Wednesday">W</th>
								<th abbr="Thursday" scope="col" title="Thursday">T</th>
								<th abbr="Friday" scope="col" title="Friday">F</th>
								<th abbr="Saturday" scope="col" title="Saturday">S</th>
								<th abbr="Sunday" scope="col" title="Sunday">S</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td abbr="February" colspan="3" id="prev"><a href="#" title="">&laquo; April </a></td>
								<td class="pad">&nbsp;</td>
								<td abbr="April" colspan="3" id="next"><a href="#" title="">June &raquo;</a></td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td colspan="5" class="pad">&nbsp;</td>
								<td>1</td>
								<td>2</td>
							</tr>
							<tr>
								<td>3</td>
								<td>4</td>
								<td>5</td>
								<td>6</td>
								<td>7</td>
								<td>8</td>
								<td>9</td>
							</tr>
							<tr>
								<td>10</td>
								<td id="today">11</td>
								<td>12</td>
								<td>13</td>
								<td>14</td>
								<td>15</td>
								<td>16</td>
							</tr>
							<tr>
								<td>17</td>
								<td>18</td>
								<td>19</td>
								<td>20</td>
								<td>21</td>
								<td>22</td>
								<td>23</td>
							</tr>
							<tr>
								<td>24</td>
								<td>25</td>
								<td>26</td>
								<td>27</td>
								<td>28</td>
								<td>29</td>
								<td>30</td>
							</tr>
							<tr>
								<td>31</td>
								<td class="pad" colspan="6">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
			<li>
				<h2>Links</h2>
				<ul>
					<li><a href="#"></a><a href="#">Home</a></li>
					<li><a href="#">About us</a></li>
					<li><a href="#">Login</a></li>
					<li><a href="#">Logout</a></li>
					<li><a href="#">Contact us</a></li>
					
				</ul>
			</li>
		</ul>
  </div>
 </div>
</body>
</html>	
	
	