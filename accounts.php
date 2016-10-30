<?php	session_start();		$_SESSION['selfEdit'] = "yes";	if(isset($_SESSION['username'])){		$_SESSION['email'] = $_SESSION['username'];	}			$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];	require_once($WebsiteRoot . '/includes/validate.php');	require_once($WebsiteRoot . '/includes/loggedIn.php');	require_once($WebsiteRoot . '/includes/accountSQL.php');	require_once($WebsiteRoot . '/includes/accountUpdate.php');			function emContact($emName, $emPhone){				if((isset($_SESSION['user'])) || (isset($_SESSION['admin']))){			echo '				<li>						<span class="labels">Emergency Contact:</span>												<div class="inputs">													<div class="left-column">									<input class="form-control" type = "text" name = "Emergency_Contact_Name-alpha" id="emergencyName" value = "' .$emName . '" maxlength="50"/>									<br/><label for="address">Full Name</label>															</div>							<div class="right-column">																	<input class="form-control" type = "text" name = "Emergency_Phone-num" id="emergencyPhone" value = "' . $emPhone . '" maxlength="50"/>									<br/><label for="address">Phone Number</label>							</div>						</div>										</li>				';					}					}?><!DOCTYPE html><html lang="en"><head>    <title>Accounts - South Coast Tyre Recycling</title>    <meta charset="utf-8">    <meta content="width=device-width, initial-scale=1" name="viewport">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">    </script>    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">    </script>    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">    <link href="style.css?version=51" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">	<script src="gen_validatorv4.js" type="text/javascript"></script>		       <script type="text/javascript">                    function enableEdit() {												var emName = document.getElementById("emergencyName");												var emPhone = document.getElementById("emergencyPhone");												if(emName && emPhone){											document.getElementById("emergencyName").disabled = false;							document.getElementById("emergencyPhone").disabled = false;									}                        document.getElementById("Fname").disabled = false;                        document.getElementById("lName").disabled = false;                        document.getElementById("address").disabled = false;                        document.getElementById("pcode").disabled = false;                        document.getElementById("State-req").disabled = false;                        document.getElementById("cName").disabled = false;                        document.getElementById("eMail").disabled = false;												document.getElementById("suburb").disabled = false;                        document.getElementById("phoneNum").disabled = false;                                       document.getElementById("submit").classList.remove("hidden");                        document.getElementById("enableForm").classList.add("hidden");                        document.getElementById("cancelEdit").classList.remove("hidden");                    }                    function disableEdit() {												var emName = document.getElementById("emergencyName");												var emPhone = document.getElementById("emergencyPhone");												if(emName && emPhone){											document.getElementById("emergencyName").disabled = true;							document.getElementById("emergencyPhone").disabled = true;									}                        document.getElementById("Fname").disabled = true;                        document.getElementById("lName").disabled = true;                        document.getElementById("address").disabled = true;                        document.getElementById("pcode").disabled = true;                        document.getElementById("State-req").disabled = true;                        document.getElementById("cName").disabled = true;                        document.getElementById("eMail").disabled = true;												document.getElementById("suburb").disabled = true;                        document.getElementById("phoneNum").disabled = true;                       						                        document.getElementById("enableForm").classList.remove("hidden");                        document.getElementById("cancelEdit").classList.add("hidden");												document.getElementById("submit").classList.add("hidden");                    }                                       window.onload = disableEdit;                                      var myForm = document.getElementById('accounts');                    myForm.addEventListener('submit', function(){						return confirm('Are you sure you want to make the changes?');                    }, false);                    </script>		<?php											if(!empty($state)){								$checkState = $state;					switch ($checkState){											case "New South Wales":									$NSW = 'selected="selected"';										break;									case "Australian Capital Territory":										$ACT = 'selected="selected"';										break;									case "Queensland":										$QLD = 'selected="selected"';										break;									case "Northern Territory":										$NT = 'selected="selected"';										break;									case "Tasmania":										$TAS = 'selected="selected"';										break;									case "Victoria":										$VIC = 'selected="selected"';										break;									case "South Australia":										$SA = 'selected="selected"';										break;									case "Western Australia":										$WA = 'selected="selected"';										break;							}					}			?></head><body>    <div class="container-fluid text-center">        <nav class="navbar navbar-inverse navbar-fixed-top">            <div class="container-fluid">                <div class="navbar-header">                    <button class="navbar-toggle" data-target="#loginNavbar"                    data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs hidden-sm" href="index.php">South Coast Tyre Recycling</a><a class="navbar-brand visible-xs menu">Menu</a>                </div>                <div class="collapse navbar-collapse" id="loginNavbar">                    <hr class="visible-xs">                     <ul class="nav navbar-nav navbar-right">                    <!-- If not logged in -->                    <?php if ($_SESSION["customer"] == false && $_SESSION["user"] == false && $_SESSION["admin"] == false) {echo "                        <li>                            <a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>                        </li>                        <li>                            <a href='registration.php'><span class='glyphicon glyphicon-user'></span> Register</a>                        </li>                    ";}?>                    <!-- If logged in as customer -->                    <?php if ($_SESSION["customer"] == true) {echo "                    ";}?>                    <!-- If logged in as admin -->                    <?php if ($_SESSION["admin"] == true) {echo "                        <li>                            <a href='editUser.php'>Edit Users</a>                        </li>                        <li>                            <a href='editPage.php'>Edit Pages</a>                        </li>                    ";}?>                    <!-- If logged in as employee or admin -->                    <?php if ($_SESSION["user"] == true || $_SESSION["admin"] == true) {echo "                        <li>                            <a href='jobSheet.php'>Job Sheets</a>                        </li>                    ";}?>                    <!-- If logged in -->                    <?php if ($_SESSION["customer"] == true || $_SESSION["user"] == true || $_SESSION["admin"] == true) {echo "                        <li>                            <a href='booking.php'>Bookings</a>                        </li>                        <li class = 'active'>                            <a href='accounts.php'><span class='glyphicon glyphicon-user'></span> Account</a>                        </li>                        <li>                            <a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>                        </li>                    ";}?>                    </ul>                    <hr class="visible-xs">                    <ul class="nav navbar-nav visible-xs">                        <li>                            <a href="index.php">Home</a>                        </li>                        <li>                            <a href="services.php">Services</a>                        </li>                        <li>                            <a href="why.php">Why?</a>                        </li>                        <li>                            <a href="about.php">About Us</a>                        </li>                        <li>                            <a href="contact.php">Contact</a>                        </li>                    </ul>                </div>            </div>        </nav>        <div class="row content">            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>            <div class="col-xs-12 col-sm-10 col-lg-8 text-left">                <header>                    <div class="navContainer">                        <nav class="navbar navbar-default">                            <div class="hidden-xs" id="mainNavbar">                                <ul class="nav nav-tabs navbar-right">                                    <li>                                        <a href="index.php">Home</a>                                    </li>                                    <li>                                        <a href="services.php">Services</a>                                    </li>                                    <li>                                        <a href="why.php">Why?</a>                                    </li>                                    <li>                                        <a href="about.php">About Us</a>                                    </li>                                    <li>                                        <a href="contact.php">Contact</a>                                    </li>                                </ul>                            </div>                        </nav>                    </div>                </header>				                <div class="mainContent">                    <h1>Accounts</h1>                            <form name="accounts" id="accounts" method="post" action="" accept-charset="UTF-8">                            <input type = "hidden" name ="submitted" id="submitted" value="1"/>                                <ul class = "accounts">                                    <li>                                        <span class = "labels">Full Name:</span>                                        <div class="inputs">                                            <div class="left-column">                                                <input class="form-control"  type = "text" name = "First_Name-req-alpha" id="Fname" value="<?php if(isset($fname)){echo $fname;}?>" maxlength="40"/>                                                <label>First Name</label>                                            </div>                                            <div class="right-column">                                                <input class="form-control" type = "text" name = "Last_Name-req-alpha" id="lName"  value ="<?php echo $lname; ?>" maxlength="40"/>                                                <label for="lname">Last Name</label>                                            </div>                                        </div>                                    </li>                                    <li>                                        <span class = "labels">Company Name:</span>                                        <div class="inputs">                                            <input class="form-control" type = "text" name = "Company_Name-req-alphanum" id="cName" value ="<?php echo $businessName; ?>" maxlength="50"/>                                            <label for="cname" class = "visible-xs">Company Name</label>                                        </div>                                    </li>                                    <li>                                        <span class="labels">Email Address:</span>                                        <div class="inputs">                                            <div class="left-column">                                                <input class="form-control" type = "email" name = "EMail-req-email" id="eMail" value ="<?php echo $email; ?>" maxlength="50"/>                                                <label for="email" class="visible-xs">Email Address</label>                                            </div>                                            <div class="right-column">                                                <label>Note: Email is also your username!</label></div>                                            </div>                                    </li>                                    <li>                                        <span class="labels">Phone Number:</span>                                        <div class="inputs">                                            <input class="form-control" type = "text" name = "Phone-req-num" id="phoneNum" value ="<?php echo $phone; ?>" maxlength="12"/>                                            <label for="phone" class="visible-xs">Phone Number</label>                                        </div>                                    </li>                                    <li>                                        <span class="labels">Address:</span>                                        <div class="inputs">                                            <div class="left-column">                                                <input class="form-control" type = "text" name = "Address-req-alphanum" id="address" value ="<?php echo $address; ?>" maxlength="50"/>                                                <label for="address">Address</label>                                                <br/>                                                <select  class="form-control" name="State-req" id="State-req" >																												<option name="selectreq" value="selectreq" >-------------Select-------------</option>																											<option name="act" value="Australian Capital Territory" <?php echo $ACT; ?> >Australian Capital Territory</option>   																										<option name="nsw" value="New South Wales"<?php echo $NSW; ?>>New South Wales</option>    																										<option name="nt" value="Northern Territory" <?php echo $NT; ?>>Northern Territory</option>																										<option name="qld" value="Queensland" <?php echo $QLD; ?>>Queensland</option>              																										<option name="sa" value="South Australia" <?php echo $SA; ?>>South Australia</option>    																										<option name="tas" value="Tasmania" <?php echo $TAS; ?>>Tasmania</option>                																										<option name="vic" value="Victoria" <?php echo $VIC; ?>>Victoria</option>                 																										<option name="wa" value="Western Australia" <?php echo $WA; ?>>Western Australia</option>																									</select>                                                <span class="required"><?php if(isset($reqState)){echo htmlentities($reqState); }?></span>                                                <label for="State-req">State</label>                                            </div>                                            <div class="right-column">																							<input class="form-control" type = "text" name = "Suburb-req-alpha" id="suburb" value ="<?php if(isset($suburb)){echo $suburb;} ?>" maxlength="50"/>                                                <label for="address">Suburb</label>                                                <br/>                                                <input class="form-control" type = "text" name = "Postcode-req-num" id="pcode" value ="<?php echo $postcode; ?>" maxlength="50"/>                                                <label for="postcode">Postcode</label>                                            </div>                                        </div>                                    </li>									<?php 											emContact($emName, $emPhone);									?>									<li>										<span class="labels"><a href="changepassword.php">Change Password</a></span>									</li>																		<li>										<span class="labels">Options:</span>																				<div class="inputs">																					<div class="left-column">											<input class="hidden btn btn-primary" type ="submit" id="submit" name ="submit" value ="Submit" size = "6"/>																																		</div>											<div class="right-column">																								  <button type="button" id="cancelEdit" class="hidden btn btn-primary" onclick="disableEdit()">Cancel Edit</button> 												  <button type="button" id="enableForm" class=" btn btn-primary" onclick="enableEdit()">Edit Details</button>											</div>										</div>																		</li>																							                                    <li></li>                                </ul>                            </form>                                                       </br> 					<?php 									errorMsg($messages);								?>                </div>								<script type="text/javascript">						var frmvalidator = new Validator("accounts");												frmvalidator.addValidation("Fname", "req", "Please enter your First Name!");						frmvalidator.addValidation("Fname", "alpha", "First Name can only contain letters!");												frmvalidator.addValidation("lName", "req", "Please enter your Last Name!");						frmvalidator.addValidation("lName", "alpha", "Last Name can only contain letters!");												frmvalidator.addValidation("cName", "req", "Please enter your Company Name!");						frmvalidator.addValidation("cName", "alnum_s", "Company Name can only contain letters, numbers and spaces!");												frmvalidator.addValidation("eMail", "req", "Please enter your E-Mail!");						frmvalidator.addValidation("eMail", "email", "Please enter your E-Mail!");												frmvalidator.addValidation("phoneNum", "req", "Please enter your Phone Number!");						frmvalidator.addValidation("phoneNum", "num", "Phone Number can only contain numbers!");												frmvalidator.addValidation("State-req", "dontselect=selectreq", "Please select a state!");												frmvalidator.addValidation("Address-req-alphanum", "req", "Please enter your Address!");						frmvalidator.addValidation("Address-req-alphanum", "alnum_s", "Address can only contain letters, numbers and spaces!");												frmvalidator.addValidation("suburb", "req", "Please enter your Suburb!");						frmvalidator.addValidation("suburb", "alpha_s", "Suburb can only contain letters and spaces!");												frmvalidator.addValidation("pcode", "req", "Please enter your Postcode!");						frmvalidator.addValidation("pcode", "num", "Postcode can only contain numbers!");							frmvalidator.addValidation("emergencyName", "alpha", "Emergency Contact Name can only contain letters!");							frmvalidator.addValidation("emergencyPhone", "num", "Emergency Phone can only contain numbers!");													</script>            </div>            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>        </div>    </div>    </body></html>