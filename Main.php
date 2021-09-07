<? php 
  
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Main Page</title>
</head>
<style type="text/css">
#div1{
  border: 2px solid rgba(12, 12, 12, 0.8);
  width: 80%;
  margin-left: auto;
    margin-right: auto;
}
 
#div2{
  border: 2px solid rgba(12, 12, 12, 0.8);
  width: 80%;
  height:555px;

  background-image: url(images/BgD2.jpg);
  background-repeat: no-repeat;
  background-position:center;
  background-size: cover;
  border-spacing: 0px 0px 0px;
  margin-left: auto;
  margin-right: auto;
  }
.fnt{
  font-style: italic;
  font-size: 40px;
  line-height: 80px;
  position:relative;
  font-family: "Comic Sans MS","fancy";
  color: #fc0000;
  left:500px;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
  
}
.txt{
  font-family: "Comic Sans MS","fancy";
  font-size: 40px;
  position: relative;
  line-height: 0px;
  left:480px;
  text-shadow: 0px 4px 4px rgba(255, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
}
#abt{
  height:650px;
  width: 80%;
  border: 2px solid rgba(12, 12, 12, 0.8);
  background-image: url(images/abt.jpg);
  background-position:center;
  background-repeat: no-repeat;
  border-spacing: 0px 0px 30px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  background-size: cover; 
  }
.abtnm{
  font-family: New Century Schoolbook, TeX Gyre Schola, serif;
  position: relative;
  color: #ffffff;
  font-size: 48px;
  line-height: 61px;
  left:40px;
}
#abtsen{
  color: #ffffff;
  font-family: cursive;
  font-size: 35px;
  position: relative;
  left:20px;
}
A{
  text-decoration: none;
  color: black;
}


#contactus{  position: relative;
  height:654px;
  width: 80%;
  border: 2px solid rgba(12, 12, 12, 0.8);
  background-image: url(images/cnt.jpg);
  background-size: cover;
  background-position:center;
  border-spacing: 0px 0px 30px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  background-repeat: no-repeat;
  background-size: cover;

}
#col{
  color: white;
  font-size: 30px;
  line-height: 300px;
  
  position: relative;
}
#select{
  height:50px;
}
#left{
  position: relative;
  left: 600px;
}
  </style >
<body>
  <!Front Page -->
   <div>
    <table border="0" width="100%"  id="div1" height="12%">
        <tr border="3" >
           <th align="Left" width="3%"><a name="abthome"><img src="images/Logo.jpg" height="25%"  ></a></th>
             
           <th align="Left" ><a name="menu"><h1>Tasty </a><br> &nbsp;&nbsp; Grab!! </h1></th>  
          <td ><a name="cntback"></a></td> 
           <td align="center"><h3><a href="#abtlink"><input type="button" value="About US"></h3></td> 
           <td align="center"><h3><a href="Signup.php"><input type="button" value="SIGN UP"></a></h3></td> 
           <td align="center"><h3><a href="login.php"><input type="button" value="Login"></a></h3></td> 
           <td align="center"><h3><a href="admin.php"><input type="button" value="Admin"></a></h3></td> 
           <td align="center"><h3><a href="#cntback1"><input type="button" value="Contact"></a></h3></td>       
         </tr>

    </table>
   </div> 
    <div id="div2">
      <p class="fnt"><br><br><br><strong>ORDER FOOD ONLINE</strong> </p>
      <p class="txt"><strong>Pizza,Burger & Dessert's...</strong></p>
     
    </div>
  <! About Us...-->
  <div id="abt">
    
    <h1 class="abtnm"><a name="abtlink">About US</a></h1>
    <p id="abtsen"> <a href="#abthome">
      &nbsp;  &nbsp; &nbsp;Tasty Grab!! is the best restuarant in Banglore,situated
      in <br> Banashankari.We are very famous for our pizza's,Even we<br> provide
      Online Food Delivery.<br>
      The restuarant started in 2016 and we won Indian Restaurant Congress Award in 2018.<br>
      Customer Sastifactory is the main goal for us.<br>
      Hope you visit our restuarant soon.</a>
    </p>

  </div>    

  <div id="contactus" >
    <table>
    <td id="col" id="contactus" style="left: 100px;">www.Tasty-Grab.com </td>
    <td id="col" id="contactus" style="left: 180px;"> 123-456</td>
    <td id="col" id="contactus" style="left: 200px;"> +91 201 405</td>
    <td id="col" id="contactus" style="left: 220px;"> tastygrab@rst.com</td>
    <td><a name="cntback1"></a></td>
  </table>
  <h1 id="col" style="left:550px;" style="line-height: 100px;"><a href="#cntback">Back</a></h1>
  </div>

    

</body>