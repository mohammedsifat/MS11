
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form</title>
</head>

<body onload="mytest">
<style type="text/css" media="all">
  body{
    background: #000;
  }
  .main{
    background: #B72626;
    margin: 0 auto;
    width: 100%;
    padding: 1%;
    height: auto;
  }
  #form{
    border: 2px solid #FFFFFF;
    
    text-align: center;
    align-items: center;
    height: auto;
  }
  #form label{
    background: #FFFFFF;
    padding: 1%;
    margin: 20px 10%;
    display: block;
    color:#A61818;
  }
  .namebox input{
    background: none;
    border: none;
    outline: none;
  }
  .gender{
    margin: 20 0;
  }
  .massage{
    background: #FFFFFF;
    position: relative;
  }
  .got{
    background: #8FFFF0;
    position: relative;
  }
  .result{
 background: #FFFFFF;
}
ul{
background:#B72626;
}
ul li{
 display:inline-block;
}
 #inputImg{
      display: none;
    }
    #userImg{
      width: 50px;
    }
</style>
<div class="main">
  <form action="" method="post" accept-charset="utf-8" id="form">
   
      
  
   <label class="namebox" for="name">Full Name : <input type="name" name="name" placeholder="Write Your Full Name"/></label>
   <label class="gender" for="gender">Gender : 
    <input type="radio" name="gender" value="male" id="male"/>male
    <input type="radio" name="gender" value="female" id="female"/>female</label>
 
 <label for="inputImg" class="input">Insert Your Image.<input type="file" name="img" id="inputImg" onchange="preview(event)"/>
 <img src="../img.jpg" id="userImg"/></label>
 
    <label for="country">country : 
    <select name="country" id="country">
   <option value="Bangladesh">Bangladesh</option>
     <option value="Pakistan">Pakistan</option>
      <option value="India">India</option>
    </select></label>
    <input type="submit" name="submit" id="submit" value="Submit"></input>
   <h1 class="massage"></h1>
   <p class="got"></p>
  </form>
<div class="fetch"></div>
</div>




<script src="jQuery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
jQuery('#form').on('submit',function(e){
e.preventDefault();
})
$(document).ready(function(){
  $('#submit').click(function(){
    
    var name= $('#name').val();
    if(name==""||!$('input:radio[name=gender]').is(':checked')){
     $('.massage').text('Have some unfilled').fadeIn(500);
       setTimeout(function(){
         $('.massage').fadeOut("slow");
       },1000);
      
    } else{
     
       
       $('#submit').css({'background':'green'});
       setTimeout(function(){
         $('#submit').css({'background':'white'});
       },1000);
      
       $.ajax({
         url:'got.php',
         type:'post',
         data:$('#form').serialize(),
         success:function(data){
           /*$('.massage').text('Succesfull').fadeIn(500);
           $('.massage').fadeOut(5000);*/
           $('.got').html(data);
         }
       })
    }
  })
})
$(document).ready(function(){
 $.ajax({
         url:'hideFetch.php',
         type:'GET',
         data: '',
         success:function(data){
           $('.fetch').html(data);
         }
       })
})

/*$(document).ready(function(){
setInterval(function{get_data()},5000);
function get_data()
{
 jQuery.ajax({
   type:"GET",
    url:"got.php",
   data:"",
   beforeSend:function(){
},
   complete: function(){
},
   success: function(){
    $('.fetch').html(data);
}
});
}
})*/
</script>
<!--script type="text/javascript">
   function preview(event){
     var input = event.target.files[0];
     var reader = new FileReader();
     reader.onload = function(){
       var result = reader.result;
       var img = document.getElementById('userImg');
       img.src = result;
     }
     reader.readAsDataURL(input);
   }
 </script-->
</body>

</html>