<?php include "_inc/start.php"; ?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>SAPE.gq</h1>
    <?php $path="u/";
$ar=getDirectorySize($path);

echo "<h4>Details for the path : $path</h4>";
echo "Total size : ".sizeFormat($ar['size'])."<br>";
echo "No. of files : ".$ar['count']."<br>";
echo "No. of websites : ".$ar['dircount']."<br>"; ?>
    <code>(C) 2022 LUQASKA<br /><br /><a href="https://git.sape.gq/Lucas/sapegq">Source code</a> - <?php if($you){ echo  } else { echo '<a href="/login.php">Login</a>'; } ?></code>
  </body>
</html>