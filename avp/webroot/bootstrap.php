<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Twitter Bootstrap 3 Horizontal Form Layout</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
	/* Fix alignment issue of label on extra small devices in Bootstrap 3.2 */
    .form-horizontal .control-label{
        padding-top: 7px;
    }
</style>

<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
              alertify.alert("Message");
            
            });
        </script>
        <script src="js/jquery.min.1.9.1.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css">
</head>
<body>
<div class="container">
  <h2>Bootstrap Mixed Form <p class="lead">with horizontal and inline fields</p></h2>
  <form role="form" class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-1" for="inputEmail1">Email</label>
      <div class="col-sm-5"><input type="email" class="form-control" id="inputEmail1" placeholder="Email"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-1" for="inputPassword1">Password</label>
      <div class="col-sm-5"><input type="password" class="form-control" id="inputPassword1" placeholder="Password"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-12" for="TextArea">Textarea</label>
      <div class="col-sm-6"><textarea class="form-control" id="TextArea"></textarea></div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"><label>First name</label><input type="text" class="form-control" placeholder="First"></div>
      <div class="col-sm-3"><label>Last name</label><input type="text" class="form-control" placeholder="Last"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-12">Phone number</label>
      <div class="col-sm-1"><input type="text" class="form-control" placeholder="000"><div class="help">area</div></div>
      <div class="col-sm-1"><input type="text" class="form-control" placeholder="000"><div class="help">local</div></div>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="1111"><div class="help">number</div></div>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="123"><div class="help">ext</div></div>
    </div>
    
    <div class="checkbox">
      <label><input type="checkbox" value="">Option 1</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Option 2</label>
    </div>
    <div class="checkbox disabled">
      <label><input type="checkbox" value="" disabled>Option 3</label>
    </div>
    
    <div class="form-group">
  <label for="sel1" class="col-sm-2">Select list:</label>
  <select class="form-control" id="sel1" class="col-sm-5">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
 <div class="form-group">
  <input type="text" id="example1"  >
  
</div>
    
    
    <div class="form-group">
      <label class="col-sm-1">Options</label>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="Option 1"></div>
      <div class="col-sm-3"><input type="text" class="form-control" placeholder="Option 2"></div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-info pull-right">Submit</button>
      </div>
    </div>
  </form>
  <hr>
</div>

<div class="container">
    <form action="#" method="post" class="form-horizontal">            
        <fieldset>
            <legend>Login Information</legend>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="user_login">Username</label>
                    <input class="form-control" id="user_login" name="user[login]" required="true" size="30" type="text" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="user_password">Password</label>
                    <input class="form-control" id="user_password" name="user[password]" size="30" type="password" />
                </div>
                <div class="col-sm-6">
                    <label for="user_password_confirmation">Password confirmation</label>
                    <input class="form-control" id="user_password_confirmation" name="user[password_confirmation]" size="30" type="password" />
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Personal Information</legend>
            <div class="form-group">
                <div class="col-sm-4">    
                    <label for="user_title">Title</label>
                    <input class="form-control" id="user_title" name="user[title]" size="30" type="text" />
                </div>
                <div class="col-sm-4">
                    <label for="user_firstname">First name</label>
                    <input class="form-control" id="user_firstname" name="user[firstname]" required="true" size="30" type="text" />
                </div>
                <div class="col-sm-4">
                    <label for="user_lastname">Last name</label>
                    <input class="form-control" id="user_lastname" name="user[lastname]" required="true" size="30" type="text" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="user_email">Email</label>
                    <input class="form-control required email" id="user_email" name="user[email]" required="true" size="30" type="text" />
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Options</legend>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="user_locale">Language</label>
                    <select class="form-control" id="user_locale" name="user[locale]"><option value="de" selected="selected">Deutsch</option>
                        <option value="en">English</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <input type="text"  name="test" id="test" class="datepicker" />
    </form>
</div>
</body>
</html>    