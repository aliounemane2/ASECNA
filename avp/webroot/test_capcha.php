
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<script language="JavaScript">

        var url='captcheck.php?code=';
        var captchaOK = 2;  // 2 - not yet checked, 1 - correct, 0 - failed
        
        function getHTTPObject()
        {
        try {
        req = new XMLHttpRequest();
          } catch (err1)
          {
          try {
          req = new ActiveXObject("Msxml12.XMLHTTP");
          } catch (err2)
          {
          try 
		  {
            req = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (err3)
            {
	          req = false;
            }
          }
	}
        return req;
	}
        
        var http = getHTTPObject(); // We create the HTTP Object        
        
        function handleHttpResponse() {
        if (http.readyState == 4) {
            captchaOK = http.responseText;
            if(captchaOK != 1) {
              alert('The entered code was not correct. Please try again');
              document.myform.code.value='';
              document.myform.code.focus();
              return false;
              }
              document.myform.submit();
           }
        }

        function checkcode(thecode) {
        http.open("GET", url + escape(thecode), true);
        http.onreadystatechange = handleHttpResponse;
        http.send(null);
        }
        
        function checkform() {
        // First the normal form validation
        if(document.myform.req.value=='') {
          alert('Please complete the "required" field');
          document.myform.req.focus();
          return false;
          }
        if(document.myform.code.value=='') {
          alert('Please enter the string from the displayed image');
          document.myform.code.value='';
          document.myform.code.focus();
          return false;
          }
          // Now the Ajax CAPTCHA validation
          checkcode(document.myform.code.value);
          return false;
        }      
        
       
</script>
<body>

<form action="landing.php" method="post" name="myform">
<table>
<tr><td>Required field:</td>
<td><input type="text" name="req" value=""></td></tr>
<tr><td>Optional field:</td>
<td><input type="text" name="opt" value=""></td></tr>
<tr><td>Captcha image:</td>
<td><img src="captcha.php" border="0"></td></tr>
<tr><td>String:</td>
<td><input type="text" name="code" value=""></td></tr>
<tr><td></td>
<td><input type="submit" value="Submit Form" onclick="return checkform()"></td>
</tr>
</table>
</form>
</body>
</html>