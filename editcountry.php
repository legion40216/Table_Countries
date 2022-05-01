<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="countries";

$connect=  mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if(mysqli_connect_error())
{
   $error= mysqli_connect_error();
}

if(isset($_GET))
{
    $id=mysqli_real_escape_string($connect,$_GET['id']);

    
    $sql ="SELECT * FROM countries_content WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $blog= mysqli_fetch_assoc($result);
 
}


if(isset($_POST['edit']))

{
  $z=0;
  $blogs=$blog;
  //converts associtive array into indexed array "array_values()"
  $convert_array= array_values($_POST);
  //removes the frist Array "array_shift()"
  array_shift($blogs);
  $blogs= array_values($blogs);
  
  
  foreach($convert_array as $x)
    {
      if($convert_array[$z]=="")
      {
        $convert_array[$z]=$blogs[$z];
      }
      $z++;
    }
 
    
    $sql ="UPDATE `countries_content` SET `company`= '$convert_array[0]', `contact`='$convert_array[1]', `countries`='$convert_array[2]',`images`='$convert_array[3]' WHERE `id` = $id";
     if(mysqli_query($connect,$sql))
      {
        header('Location:editcountry.php?id='.$id);
      }
      else{
          //error
          echo 'query error'.mysqli_error($connect);
      }

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="myScript.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b6920f1e00.js" crossorigin="anonymous"></script>
    </head>
    
    <style>
    
        
    *{
        padding:0;
        box-sizing: border-box;
    }
    body{
        font-family: 'Quicksand', sans-serif;
        display:flex;
        justify-content: center;
        align-items:center;
      
        flex-direction:column;
        padding: 5px;
        overflow-x:hidden;
       
    }
    
    table{
       
        border-collapse: collapse;
        
        font-size: 1.2em;
        border-radius: 5px 5px 0 0;
        overflow:hidden;
    
        width:100%;
       
       
        
        
    }
    td,th{
        padding:10px 30px;
    }
    
    tr{
       position:relative;
       border-bottom: 1px solid #dddddd;
    }
    img{
        width: 100%;
    height: 100%;
    object-fit: cover;
    }
    
     tr:nth-child(1)
     {
       background-color: #009879;
       color:white;
       text-align:left;
       font-weight:bold;
      
     } 
     
    tr:nth-of-type(even)
    {
        background-color:#f3f3f3f3
    }
    tr:last-of-type
    {
        border-bottom: 3px solid #009879;
    }
    
    td:nth-child(4)
     {
         
         width: 150px;
         height:80px;
         padding: 0px;
      
     } 
    
     th:last-of-type{
         text-align:center;
     }
      td{
          cursor:pointer;
          font-weight:500;
      }
      .datatable:hover{
       color:#009879;
     }
     .main{
    width:100%;
   max-width:1300px;
   display: flex;
   flex-direction:column;
   gap:50px;
   }
   .mini-options{
    visibility: hidden;
    position: absolute;
   
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 5px;
    z-index: 1;
 
 
}
.arrow {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 8px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.arrowtop {
  content: "";
  position: absolute;
  top: -30%;
  left: 50%;
  margin-left: -5px;
  border-width: 8px;
  border-style: solid;
  border-color:  transparent  transparent #555 transparent;
}

.arrowleft {
  content: "";
  position: absolute;
  top: 33%;
  left: -8%;
  margin-left: -5px;
  border-width: 8px;
  border-style: solid;
  border-color:  transparent #555 transparent  transparent;
}

.show {
  visibility: visible;

 
}

.animation {
 

  animation:  slideInFromLeft 1s;
}

@keyframes slideInFromLeft {
  0% {
     opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.form1{
    display: flex;
    gap: 3px;
    margin-bottom:0px;
}
nav{
width:100%;
margin-top:15px;
}

.button{
padding: 0.375rem 1.75rem !important ;
font-size: 1.2rem !important;
font-weight:600 !important;
}
i{
margin-right:10px;
}

.form2{
   
   padding: 20px;
      
      box-shadow: 0px 0px 8px 1px #888888;
      width: 80%;
       margin: 30px auto;
       border-radius:5px
   }

</style>
<body>

    <div class="main">
    <nav>
    <a href="example2.php">   
    <button class=" button btn btn-primary"><i class="fas fa-angle-left"></i>Back</button>
    </a>    
</nav>

        <table>
        
        
        <tr>
        
            <th>Company</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Flags</th>
          </tr>
            
        
          
            <tr class="datatable" >
            
                <td><?= $blog['company']; ?>
        
                <div class=" mini-options">
                    <div class="arrow"></div>
                
        <form action="example2.php" method="post" class="form1">
                      
        
        <button class="btn btn-danger" type="submit" name="delete" value="<?=$blog['id'] ?>">Delete</button>
        
        <div class="btn btn-primary">Edit</div>
        
        </form>
                    
                </div>
            </td>
                <td><?= $blog['contact']; ?></td>
             
                <td><?= $blog['countries']; ?></td>
                <td> <img src="Uploads/<?php echo $blog['images'];?>"></td>
             
            </tr>
            
        </table>
    
        <form id="section2" action="editcountry.php?id=<?=$id?>" method="post" class="enable add_form d-flex gap-3 flex-column  form2">
    <h4 class="align-self-baseline">Edit Data</h5>
    <div class="text-forms  gap-3">
<div class="mb-3">
    <label for="company" class="form-label">Company</label>
    <input type="text" class="form-control" name="company"  >
    </div>
    <div class="mb-3">
    <label for="contact" class="form-label">Contact</label>
    <input type="number" class="form-control" name="contact"  >
    </div>
    
    <div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <input type="text" class="form-control" name="country"  >
    </div>
    </div>
    <div class="img-sumbit  d-flex flex-row">
    <div class="mb-3">
    <label for="imgs">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*" >
  </div>
  <input type="submit" name="edit" value="Submit" class="btn btn-primary btn-lg px-5">
  </div>
  
</form>


</body>
</html>