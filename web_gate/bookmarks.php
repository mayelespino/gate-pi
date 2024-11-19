<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<body bgcolor = "#336699">
    <a href="index.php">[Home]</a>
    <h1>Bookmarks</h1>

<button onclick="history.back()">Go Back</button>
<hr/>
<br/>

<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('bookmarks.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully<BR/>\n";
   }

   $sql =<<<EOF
      SELECT * from bookmarks;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "URL = ". $row['url'] . "<BR/>\n";
      echo "DESCRIPTION = ". $row['description'] ."<BR/>\n";
      echo "TAGS = ". $row['tags'] ."<BR/>\n";
      echo "<BR/>\n";
   }
   echo "Operation done successfully<BR/>\n";
   $db->close();

?>
</body>
</html>
