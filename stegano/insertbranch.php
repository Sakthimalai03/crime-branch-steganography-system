<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Information transmission in crimebranch using Steganography</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<?php
	include("dbcon.php");
	if(!isset($_POST['submit']))
	{
		$sql="select count(*) from branchdet";
		$rs=mysql_query($sql);
		while($a=mysql_fetch_array($rs))
		{
			$cnt=$a[0];
		}

		if($cnt==0)
		$max=1;
		else
		{
			$sql1="select max(branchid) from branchdet";
			$rs1=mysql_query($sql1);
			while($a=mysql_fetch_array($rs1))
			{
			$max=$a[0];
			}
			$max++;
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


<form id="form1" name="form1" method="post" action="">
<center><h2><font color="white">NEW BRANCH DETAILS</font></h2></center>
  <table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
   <tr>
	<td>Branch Id:</td>
	<td><input type="text" name="branchid" value="<?php if(!isset($_POST['submit'])) echo $max; ?>"></td>
 </tr>
    <tr>
      <td>Branch Name:</td>
      <td><label>
        <input type="text" name="brname" id="brname" />
      </label></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><label>
        <textarea name="braddr" id="braddr" cols="45" rows="5"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>City:</td>
      <td><label>
        <select name="brcity" id="brcity">
          <option>----select-----------</option>
          <option value="madurai">Madurai</option>
          <option value="chennai">Chennai</option>
          <option value="trichy">Trichy</option>
          <option value="tanjore">Tanjore</option>
          <option value="kovai">Kovai</option>
          <option value="salem">Salem</option>
          <option value="karur">Karur</option>
          <option value="coimbatore">Coimbatore</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Pincode:</td>
      <td><label>
        <input type="text" name="brpincode" id="brpincode" />
      </label></td>
    </tr>
    <tr>
      <td>Phone number:</td>
      <td><label>
        <input type="text" name="brphno" id="brphno" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="submit" id="submit" value="Submit" />
        </label>
      </div></td>
    </tr>
  </table>
</form>


<?php
	if(isset($_POST['submit']))
	{
		include("dbcon.php");
		$branchid=$_POST['branchid'];
		$brname=$_POST['brname'];
		$braddr=$_POST['braddr'];
		$brcity=$_POST['brcity'];
		$brpincode=$_POST['brpincode'];
		$brphno=$_POST['brphno'];
		
		$sql="insert into branchdet values($branchid,'$brname','$braddr','$brcity',$brpincode,'$brphno')";
		
		if(mysql_query($sql))
				
			echo "<br><font color='red' size='5'>Branch Details inserted...</font>";	
			
		
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
	
	