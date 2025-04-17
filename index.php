<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AJAX Delete Data</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="logo">MyLogo</div>
        <nav>
        <a href="#">Home</a>
        <a href="about.php">About</a>
        <a href="#">Contact</a>
        </nav>
        <button class="header-btn">Sign Up</button>
    </header>

    <div class="form-container">
        <form id="add-form">
            <input type="text" placeholder="Name" id="c_name" required>
            <input type="tel" placeholder="Phone Number" id="c_number" required>
            <button type="submit" class="form-btn" id="save-btn">Submit</button>
        </form>
    </div>



    <div id="table-data">

        
    </div>

    <footer>
        © 2025 Simple Project. All rights reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>  

    <script type="text/javascript">

        $(document).ready(function(){

            function loadtable(){

                $.ajax({

                    url : "ajax-load.php",
                    type : "POST",
                    success : function(data){

                        $("#table-data").html(data);

                    }

                });

            

            }
            loadtable();
           

            $("#save-btn").on("click",function(e){
                e.preventDefault();
                var c_name = $('#c_name').val();
                var c_number = $('#c_number').val();

                if(c_name == "" || c_number == ""){

                    alert("Fileds are requried");

                }else{

                    $.ajax({

                        url : "ajax-insert.php",
                        type : "POST",
                        data : {customer_name:c_name, customer_number:c_number},
                        success : function(data){
                        if(data == 1){

                            loadtable();
                            
                            $("#add-form").trigger("reset");

                        }else{

                            alert("Can't Save Data");

                        } 

                            
                        }
                    })


                }

                
            });

            $(document).on("click",".delete-btn", function(){

                var customerID = $(this).data("id");
                var element = this;
                
                
                $.ajax({

                    url: "ajax-delete.php",

                    type : "POST",

                    data: {c_id:customerID},

                    success : function(data){

                        if(data == 1){

                            $(element).closest("tr").fadeOut();
                        }

                    }

                })

            })
        
        });

    </script>



</body>
</html>
