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
else{
    $go= "You are connected";
}

$qry = "SELECT * FROM countries_content";

$result = mysqli_query($connect,$qry);

if($result=== false)
{
    $error= mysqli_error($connect);
}

else
{
    $content =mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if(isset($_POST['submit']))
{
    $company=$_POST['company'];
    $country=$_POST['country'];
    $contact=$_POST['contact'];
    $img=$_POST['img'];




    $query="INSERT INTO countries_content(company,contact,countries,images) VALUES('$company','$contact','$country','$img')";
   
    if(mysqli_query($connect,$query))
    {
        header('Location:example2.php');
     
    }
 else{
       //error
       echo 'query error'.mysqli_error($conn);
   }
}

if(isset($_POST['delete']))
{
 
$id_delete=$_POST['delete'];    

$query = "DELETE FROM countries_content WHERE id = $id_delete";
if(mysqli_query($connect,$query))
{
    header('Location:example2.php');
 
}
else{
   //error
   echo 'query error'.mysqli_error($conn);
}
}

?>

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



.connected{
display:flex;
justify-content: end;
width:100%;
margin-top: 5px;
}

.connected span{
padding:5px 35px;
font-size:20px;
color:white;
background-color:#00CBA2;
border-radius:10px;


} 

.main{
    width:100%;
   max-width:1300px;

}

.form2{
   
padding: 20px;
   
   box-shadow: 0px 0px 8px 1px #888888;
   width: fit-content;
    margin: 30px auto;
    border-radius:5px
}

label{
    font-weight: 500;
}

.addbtn {
    background: #009879;
    border :1px solid #009860;
   
}

.addbtn:hover {
    background:#1dae90;
    border :1px solid #00CBA1  
}

.enable{
    display:none !important;    
}

.add_form{
    animation: 2s ease-out  slideInFromLeft;
    display:none; 
}
.change{
    animation: 1s ease-out  change;
    animation-fill-mode: forwards;
}

.backgroundcolor{
    background: #d04144;
    border:#d04144;
   
}
.backgroundcolor:hover{
    background: #e32e32;
    border:#d04144;
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

@keyframes change {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(45deg);
    
  }
}

a{
    color:white;
}

a:hover{
    
    color:white;
} 


.form1{
    display: flex;
    gap: 3px;
    margin-bottom:0px;
}

</style>

<body>


<div class="main">

<table>


<tr>

    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
    <th>Flags</th>
  </tr>
    

  
    <?php foreach($content as $blog) : ?>
    <tr class="datatable" >
    
        <td><?= $blog['company']; ?>

        <div class=" mini-options">
            <div class="arrow"></div>
        
<form action="example2.php" method="post" class="form1">
              

<button class="btn btn-danger" type="submit" name="delete" value="<?=$blog['id'] ?>">Delete</button>

<a href="editcountry.php?id=<?=$blog['id'] ?>"><div class="btn btn-primary">Edit</div></a>

</form>
            
        </div>
    </td>
        <td><?= $blog['contact']; ?></td>
     
        <td><?= $blog['countries']; ?></td>
        <td> <img src="Uploads/<?php echo $blog['images'];?>"></td>
     
    </tr>
        
  <?php endforeach; ?>
  
  

</table>
<div class="options mt-2 d-flex align-items-center">
  <div class="addbtn btn btn-primary btn-lg" onclick="add()"><a  href="#section2"><i class="fas fa-plus fa-2x"></i></a></div>  
<?php if(!empty($go)) : ?>

<div class="connected"><span><?= $go; ?></span></div>

<?php endif; ?>


</div>
<form id="section2" action="example2.php" method="post" class="enable add_form d-flex gap-3 flex-column align-items-center form2">
    <h4 class="align-self-baseline">Add Data</h5>
    <div class="text-forms d-flex gap-3">
<div class="mb-3">
    <label for="company" class="form-label">Company</label>
    <input type="text" class="form-control" name="company"  required>
    </div>
    <div class="mb-3">
    <label for="contact" class="form-label">Contact</label>
    <input type="number" class="form-control" name="contact"  required>
    </div>
    
    <div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <input type="text" class="form-control" name="country"  required>
    </div>
    </div>
    <div class="img-sumbit  d-flex flex-row">
    <div class="mb-3">
    <label for="imgs">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*"  required>
  </div>
  <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg px-5">
  </div>
  
</form>
</div>

<script>
var add_form=document.querySelector(".add_form");
var add_btn=document.querySelector(".fas");
var add_btns=document.querySelector(".addbtn");

console.log(add_form);
function add(){
    console.log(add_form);
    add_form.classList.toggle("enable");
    add_btn.classList.toggle("change");
    add_btns.classList.toggle("backgroundcolor");
}

var clicked = document.querySelectorAll(".datatable");
var clicks = document.querySelector(".datatable");


// clicked.forEach(element => 
//     {
//         element.addEventListener("click", () =>{
//             var move=element.querySelector(".mini-options")
//             move.style.left =event.pageX +"px" ;
//          move.style.top=event.pageY+"px";

//         })


// })


/*the code below help in the popups when clicked on certain areas it will change the pop direaction
towards its parent area*/

clicked.forEach(element => 
    {
        element.addEventListener("click", () =>{
          
            var move=element.querySelector(".mini-options")
            var arrow=element.querySelector(".arrow")
            move.classList.toggle("show");
            move.classList.add("animation");
            arrow.classList.remove("arrowtop");
            arrow.classList.remove("arrowleft");


            var valuesx =  event.pageX;
            move.style.left =valuesx +"px" ;
         
            var valuesy =  event.offsetY ;  
            move.style.top=valuesy +"px";

if(valuesy > 50 )
{
    arrow.classList.add("arrowtop");
}
        
if(valuesy < 50 && valuesy > 10  )
{
    arrow.classList.add("arrowleft");
}

              move.addEventListener("animationend", () =>{
                move.classList.remove("animation");
            })
})

})

 


   


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>
</html>