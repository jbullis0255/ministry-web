<?php ?>
<html>
<head><title>OOP</title>
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="gemasglam.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css">    
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="jQuery.cross.js"></script>
    <style type="text/css">
        .form-control{
            border-radius: 50px;
        }
        body{font-family: sans-serif}
        .btn-group label {display: block; padding: 5px; position: relative; padding-left: 20px;}
.btn-group label input {display: none;}
.btn-group label span {border: 1px solid #ccc; width: 15px; height: 15px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
.btn-group input:checked + span {background: white; border-color: white;}
    </style>
    </head>
    <body>
        <div class="container-fluid">
       <h1 class="text-primary text-center">PHP OOP</h1>
        <div class="card">
            <div class="card-header py-1"><h5>All the practice</h5></div> 
            <div class="card-body">
                <form action="" method="post" autocomplete="off" id="userMessage">
            <div class="form-group">
            <input type="text" name="name" placeholder="Full Name" class="form-control" id="name">
            <span class="text-danger name"></span>
            </div>
            <div class="form-group">
            <input type="text" name="phoneNumber" placeholder="Phone Number" class="form-control" id="phoneNumber">
            <span class="text-danger phoneNumber"></span>
            </div>
            <div class="form-group">
            <input type="email" name="email" placeholder="email" class="form-control" id="email">
            <span class="text-danger email"></span>
            </div> 
            <div class="form-group">
            <textarea name="message" placeholder="Message" class="form-control" id="message"></textarea>
            <span class="text-danger message"></span>
            </div>   
            <div algin="right">
            <input type="hidden" name="sendMessage" value="message"/>
            <button type="submit" name="create_chat" class="btn btn-primary sendMessage">Submit</button>
            </div>
            </form>
            <div class="response"></div>
            </div>
            </div>
            <i class="fas fa-star text-warning"></i><i class="far fa-star text-warning"></i>
            <div>
            <p>Shoes</p>
            <p>Rate this Product</p>    
                <div class="btn-group">
<label><input type="radio" name="select1" id="select1" /><span><i class="far fa-star" id="r1"></i></span></label>
<label><input type="radio" name="select2" id="select2" /><span><i class="far fa-star" id="r2"></i></span></label>
<label><input type="radio" name="select3" id="select3" /><span><i class="far fa-star" id="r3"></i></span></label>
<label><input type="radio" name="select4"  id="select4"  /><span><i class="far fa-star" id="r4"></i></span></label>
<label><input type="radio" name="select5" id="select5" /><span><i class="far fa-star" id="r5"></i></span></label>
</div> <p class="feel"><i class=""></i> </p>
            </div>
        </div>
        <kbd>Ctr + p</kbd>
        <script>
        $(document).ready( () => {
            $("#select1").on("click", () => {
                   $("#r1").toggleClass("fas far-star text-warning");  
                $(".feel i").toggleClass("fas fa-angry text-danger");
                });
             $("#select2").on("click", () => {
                   $("#r2").toggleClass("fas far-star text-warning"); 
                 $(".feel i").toggleClass("fas fa-angry text-danger");
                 $(".feel i").toggleClass("fas fa-smile text-warning");
                });
            $("#select3").on("click", () => {
                   $("#r3").toggleClass("fas far-star text-warning"); 
                $(".feel i").toggleClass("fas fa-smile text-warning");
                 $(".feel i").toggleClass("fas fa-smile-wink text-warning");
                });
            $("#select4").on("click", () => {
                   $("#r4").toggleClass("fas far-star text-warning"); 
                $(".feel i").toggleClass("fas fa-smile-wink text-warning");
                 $(".feel i").toggleClass("fas fa-smile-beam text-success");
                });
            $("#select5").on("click", () => {
                   $("#r5").toggleClass("fas far-star text-warning"); 
                $(".feel i").toggleClass("fas fa-smile-beam text-success");
                 $(".feel i").toggleClass("fas fa-heart text-danger");
                });
//send the message from user with ajax
                $("#userMessage").on("submit", function(e) {
                    e.preventDefault();
                    $data = $(this).serializeArray();
                    $.ajax({
                        url: "send-message",
                        type: 'POST',
                        data: $data,
                        beforeSend: function() {
                            $(".sendMessage").html("<span class='spinner-border spinner-sm'></span>sending...");
                        },
                        success: function(data) {
                            $(".response").html(data);
                        },
                        complete: function() {
                            $(".sendMessage").text("Send");
                        }
                    });

                });
//validate pForm
    var error = "Please fill in this field correctly!!";
    $("#name").on("keyup", function() {
      let alpher = /^([a-zA-Z_]+( [a-zA-Z_]+)|[a-zA-Z_]+( [a-zA-Z_])+( [a-zA-Z_]+))*$/;
      if(!$(this).val().match(alpher)) {
        $(this).css({border: '2px solid red'});
          $(this).focus();
          $(".name").text(error);
       
      }else {
          $(".name").text("");
        $(this).css({border: '2px solid green'});
      }
    });
      $("#phoneNumber").on("keyup", function() {
      let dis = /^([+])([0-9]{12})*$/;
      if(!$(this).val().match(dis)) {
        $(this).css({border: '2px solid red'});
          $(".phoneNumber").text(error);
          $(this).focus();
      }else {
          $(".phoneNumber").text("");
        $(this).css({border: '2px solid green'});
      }
    });
      $("#email").on("keyup", function() {
      let nat = /^[a-z0-9-.]{1,30}@[a-z]{1,65}.(com|net|org|biz|info|([a-z]{2,3}.[a-z]{2}))*$/;
      if(!$(this).val().match(nat)) {
        $(this).css({border: '2px solid red'});
          $(this).focus();
          $(".email").text(error);
      }else {
          $(".email").text("");
        $(this).css({border: '2px solid green'});
      }
    });
    $("#message").on("keyup", function() {
      let com = /^([a-zA-Z]|[a-zA-Z_]+( [a-zA-Z_]+)|[a-zA-Z_]+( [a-zA-Z_])+( [a-zA-Z_]+))*$/;
      if(!$(this).val().match(com)) {
        $(this).css({border: '2px solid red'});
          $(this).focus();
          $(".message").text(error);
      }else {
          $(".message").text("");
        $(this).css({border: '2px solid green'});
      }
    });
        });
        </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>