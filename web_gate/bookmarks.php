<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<body bgcolor = "#336699">
    <a href="index.php">[Home]</a>
    <h1>Bookmarks</h1>

<hr/>
<br/>

<h2>Add</h2>
<form name="add_form" method="post" action="add_bm_form.php">
  <label for="url">url:</label><br>
  <input type="text" id="url" name="url" size="80"><br>
  <label for="description">description:</label><br>
  <input type="text" id="description" name="description" size="80"><br>
  <label for="tags">tags:</label><br>
  <input type="text" id="tags" name="tags" size="80" > <br>
  <input type="submit" value="Submit">
</form>

<br><br>

<h2>Search</h2>
<form name="search_form" method="post" action="search_bm_form.php">
  <label for="seach_string">seach_string:</label><br>
  <input type="text" id="seach_string" name="search_string" size="80"> <br>
  <input type="submit" value="Submit">
</form>

<br/><br/>

<!--
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
-->

</body>
</html>
