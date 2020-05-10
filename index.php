<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ANS qgg webserver</title>
<link href="/css/web.css" type="text/css" rel="stylesheet" />
</head>

<body>

<div class="title">
Welcome to the Genotype Imputation Server
</div>
<div class="table">
<form enctype="multipart/form-data" name="ff" method="post" action="/work.php">
    <div class="formin">
        Select input data file:
        <input id="infile" type="file" name="inputfile" required="required" autocomplete="off"/>
    </div>
    <div class="formin">
        Email address to recieve result:
        <input id="email" type="email" name="user_email" required="required" autocomplete="off"/>
    </div>
    <div class="formin buttom">
        <input class="buttomset" type="submit" value="submit"/>
        <input class="buttomset" type="reset" value="reset"/>
    </div>
</form>
</div>

</body>
</html>
