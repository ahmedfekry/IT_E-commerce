 <?php
    session_start();
    if(!isset($_SESSION['admin']) ) {
         header ("Location: index.php"); 
         exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Store Page</title>
    <link href="StorePage.css" rel="stylesheet">
    <link rel="stylesheet" href="untitled.css">

</head>
    <body>
    <!-- -->
    <div class="wrap">
        <div id="header">
            <!-- Here's all it takes to make this navigation bar. -->
            <ul id="nav">
                 <li id="login"><a href="logOut.php">Logout</a></li>
             </ul>
            <!-- done. -->
        </div>

        <div class="main">
            <nav class="nav1">
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="shoppingCart.php" target="_self" >Shopping Cart</a></li>
                    <div id="menu">
                        <ul id="nav2">
                            <!-- <li><a href="#" target="_self" >Main Item 1</a></li> -->
                            <li><a href="homepage.php" target="_self" name="selected">select category</a>
                                <ul>
                                    <li><a href="homepage.php" >All products</a></li>
                                    <li><a href="laptop.php"  >lap-tops</a>
                                        <ul>
                                            <li><a href="toshipa.php"  >toshipa</a>
                                            <li><a href="hp.php"  >hp</a>
                                        </ul>
                                    </li>
                                    <li><a href="camera.php"  >Camera</a>
                                        <ul>
                                            <li><a href="sony.php"  >sony</a>
                                            <li><a href="canon.php"  >canon</a>
                                        </ul>
                                    </li>
                                    <li><a href="mobile.php"  >mobile</a>
                                        <ul>
                                            <li><a href="samsung.php" >samsung</a>
                                            <li><a href="nokia.php"  >nokia</a>
                                        </ul>
                                    <!-- </li>
                                    <li><a href="others.php"  >others</a>
                                        
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>

                </ul>
            </nav>
            <!-- Projects Row -->
            <div class="rows">
                
                <h2>
                        <a href="">  All Products </a>
                    </h2>
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "e_commerce";
                $currency = "$";
                $customerId = 1;#$_SESSION['id'];
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
				$query = "SELECT * FROM product WHERE category = 'camera' AND subcategory = 'canon'  ORDER BY id ASC";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<form >';
                    echo "<ul>";
                 while($obj = $result->fetch_object())
                    {
                        
                        $img = $obj->picture;
                        $i= $obj->id;
                        echo "  
                            <li>    
                            <a href='ProductInfo.php?id=$i\' target='_blank'><img src='$img' class='pic1' width='200px' height='200px'/></a>
                                <p style = 'text-align: -webkit-center;'><a href='' title='read more'> Name: ".$obj->item_name."<br>Quantity: ".$obj->quantity_in_stock."<br>Price: ".$obj->price."<br>Category: ".$obj->category."</a></p>
                                <input type='hidden' name='productId' value=".$obj->id." />
								<input type ='number' value = '1' name='numberOfProducts' min = '1' max = ".$obj->quantity_in_stock." />
                                <button class='add_to_cart' type='submit'>Add To Cart</button>
                            </li>
                         ";
                    
                    }
                    echo "</ul>";
                    echo '</form>';
                    }
                    else
                    {
                        echo mysqli_error($conn);
                    }
                ?>
                <pre><a href=""><span class="chevron2 left"></span></a>  <a href=""><span class="chevron2 right"></span></a></pre>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>
    <script>
        $(document).ready(function(){
        $("form").on('submit',function(event){
    event.preventDefault();
        // alert("Hello");
        data = $(this).serialize();

        $.ajax({
        type: "GET",
        url: "createOrderProccessing.php",
        data: data
        }).done(function( msg ) {
        alert( "Data Saved: " + msg );
        });
    });
});
</script>

    </body>
</html>