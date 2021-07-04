<?php
  include "php/config.php";
  if(isset($_GET['u'])){
  $u=mysqli_real_escape_string($conn,$_GET['u']);

  $sql=mysqli_query($conn,"SELECT full_url FROM url WHERE shorten_url='{$u}'");

  if(mysqli_num_rows($sql)>0){
      $full_url=mysqli_fetch_assoc($sql);
      header("Location:".$full_url['full_url']);
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Url Shortner</title>
</head>
<body>
    <div class="wrapper">
        <form action="#">
            <input type="text" name="full-url" placeholder="Enter a long url" required>
            <button>Shorten</button>
        </form>
        <?php 
            $sql2=mysqli_query($conn,"SELECT * FROM url ORDER BY id DESC");
            if(mysqli_num_rows($sql2)>0){
                ?>
                    <div class="urls-area">
                        <div class="title">
                          
                        </div>
                    
                        <?php
                        while($row=mysqli_fetch_assoc($sql2)){
                            
                            ?>
                            <div class="data">
                            <li>
                                    <a href="<?php echo $row['full_url']?>">
                                    <?php 
                                        if('localhost/url?u='.strlen($row['shorten_url'])>50){
                                            echo 'localhost/url?u='.substr($row['shorten_url'],0,50).'....';
                                        }else{
                                            echo 'localhost/url?u='.$row['shorten_url'];
                                        }
                                    
                                        ?>
                                    </a>
                                    </li>
                                    <li><?php 
                                            if(strlen($row['full_url'])>65){
                                                echo substr($row['full_url'],0,65).'.....';
                                            }else{
                                                echo $row['full_url'];
                                            }
                                         
                                        ?></li>
                            </div>
                            <?php
                      }
                      ?>
                    </div>
                      <?php 
                    }
                    ?>
       
    </div>
    <div class="blur-effect"></div>
    <div class="popup-box">
        <div class="info-box">Your link is ready</div>
        <form action="#">
            <input type="text" spellcheck="false" value="">
            <button>save</button>
        </form>
    </div>
    <script src="scr.js"></script>
</body>
</html>