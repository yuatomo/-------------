<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>サンプルページ</title>
  </head>
  <body>
    <?php
      $dsn = 'mysql:host=localhost;dbname=examquiz';
      $username = 'root';
      $password = '';
      try {
        $dbh = new PDO($dsn, $username, $password);
        echo "<p>Succeed!</p>";
        $sql = 'select * from user_status';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        foreach ($result as $row) {
          echo $row['User_Name']." ";
          echo $row['Pass_word']." ";
          echo "<br />";
        }
      } catch (PDOException $e) {
        echo "<p>Failed : " . $e->getMessage()."</p>";
        exit();
      }
      // echo $_POST['message'];
    ?>
    <!-- <form action="" method="post">
      <input type="text" name="message"><br>
      <input type="submit" value="送信">
    </form> -->
  </body>
</html>