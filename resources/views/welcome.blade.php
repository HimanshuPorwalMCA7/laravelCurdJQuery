<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AZAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <a href="read">Read</a>
    <h1>Register Now</h1>
    <form id="my-form">
    @csrf
    Name:<input type="text" name="name" placeholder="Enter Your Name" required><br><br>
    Email:<input type="email" name="email" placeholder="Enter Email" required><br><br>
    Password<input type="password" name="password" placeholder="Enter Password" required><br><br>
    <input type="submit" value="Add Your Data" id="btnSubmit">
    </form>
    <span id="output"> </span>{{-- resopse show karane k liye --}}

{{-- Data store Karane ki J Query --}}
    <script>
        $(document).ready(function(){//jquery
            $("#my-form").submit(function(event){
                event.preventDefault();//form submit nhi hoga
                var form = $("#my-form")[0];//form ka object banane k liye

                var dt = new FormData(form);//form m se data nikalne k liye
                $("#btnSubmit").prop("disabled",true);//submit button disable karne k liye
                    $.ajax({
                        type:"POST",
                        url:"{{ route('registered') }}",
                        data:dt,
                        processData:false,
                        contentType:false,
                        success:function(data){
                            $("#output").text(data.res);//response show karane k liye
                            $("#btnSubmit").prop("disabled",false);//button  enable ho jaye
                            $("input[type='text']").val('');//box khali ho jaye
                            $("input[type='email']").val('');//box khali ho jaye
                            $("input[type='password']").val('');//box khali ho jaye
                        },
                        error:function(e){
                            $("#output").text(e.responseText);
                            $("#btnSubmit").prop("disabled",false);
                        }
                    });
                });
            });
    </script>
</body>



