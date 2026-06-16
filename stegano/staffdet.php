<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Information transmission in crimebranch using watermark embedding</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<?php
error_reporting(E_ERROR);	
	include("dbcon.php");
	if(!isset($_POST['submit']))
	{
		$sql="select brname from branchdet";

		$rs=mysql_query($sql);

		$brname=array();
		$i=0;

		while($a=mysql_fetch_array($rs))
		{	
			$brname[$i]=$a[0];
			$i++;
		}

		$sql1="select count(staffid) from staffdet";

		$rs1=mysql_query($sql1);

		while($a1=mysql_fetch_array($rs1))
		{
			$cnt=$a1[0];
		}
		if($cnt==0)
			$maxstaffid=1;
		else
		{
			$sql2="select max(staffid) from staffdet";
			$rs2=mysql_query($sql2);
			while($a2=mysql_fetch_array($rs2))
			{
				$maxstaffid=$a2[0];
			}
			$maxstaffid++;	
		}
	}
?>

<body>
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
				<li><a href="insertbranch.php">New Branch</a></li>
				<li><a href="staffdet.php">New Staff</a></li>
				<li><a href="userconfig.php">User Configuration</a></li>
				<li><a href="sendmsg.php">Send Message</a></li>
				<li><a href="receivemsg.php">Receive Message</a></li>
				<li><a href="logout.php" target="_top">Logout</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		
		<!-- end #search -->
	</div>
	<!-- end #header -->
</div>
<div id="page">
	<div id="content">
		<div class="post">


	<form name="f1" action="?" method="post">

	<h2><center><font color="white">NEW STAFF DETAILS ENTRY</font></center></h2>
	<table border="1" align="center">
	<tr>
	<td>Branch Name:</td>
	<td><select name="brname">
		<?php

		foreach($brname as $temp)
		echo "<option value="."'".$temp."'".">".$temp."</option>";
		
		?>
		</select>
	</td>
	</tr>

	<tr>
	<td>Staff Id:</td>
	<td><input type="text" name="staffid" value="<?php if(!isset($_POST['submit']))echo $maxstaffid; ?>"></td>	
	</tr>

	<tr>
	<td>Staff Name:</td>	
	<td><input type="text" name="sname"></td>
	</tr>
	
	<tr>	
	<td>Designation:</td>
	<td><select name="desn">
		<option>---select---</option>
		<option value="Inspector-General">Inspector General</option>
		<option value="Inspector">Inspector</option>
		<option value="Sub-Inspector">Sub-Inspector</option>
		<option value="Constable">Constable</option>
		<option value="Writer">Writer</option>
		<option value="HeadConstable">HeadConstable</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Address:</td>
	<td><textarea name="addr"></textarea></td>
	</tr>

	<tr>	
	<td>Phone:</td>	
	<td><input type="text" name="phno"></td>
	</tr>

	<tr>
	<td>Email Id:</td>
	<td><input type="text" name="mailid"></td>
	</tr>

	<tr>
	<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
	</tr>
</table>
</form>

<?php
	if(isset($_POST['submit']))
	{

	$brname=$_POST['brname'];
	$sid=$_POST['staffid'];
	$sname=$_POST['sname'];
	$desn=$_POST['desn'];
	$addr=$_POST['addr'];
	$phno=$_POST['phno'];
	$emailid=$_POST['mailid'];

	$sql="insert into staffdet values('$brname',$sid,'$sname','$desn','$addr','$phno','$emailid')";

	if(mysql_query($sql))
	echo "<br><font color='red' size='5'>Staff Details Inserted..</font>";
	/*else
	echo mysql_error();*/
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
					<li><a href="insertbranch.php" target="a">New Branch</a></li>
		<li><a href="staffdet.php" target="a">New Staff</a></li>
		<li><a href="userconfig.php" target="a">User Configuration</a></li>
		<li><a href="sendmsg.php" target="a">Send Message</a></li>
		<li><a href="receivemsg.php" target="a">Receive Message</a></li>
		<li><a href="logout.php" target="_top">Logout</a></li>
					
				</ul>
			</li>
		</ul>
  </div>
 </div>
</body>
</html>	
	
	