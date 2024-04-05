<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <h1>Update Form</h1>
    <form id="update-form">
        @csrf
     Name<input type="text" name="name" value="{{ $data->name }}"><br><br>
     Email<input type="email" name="email" value="{{ $data->email }}"><br><br>
     <input type="hidden" name="id" value="{{ $data->id }}">
     <input type="submit" value="Update Your Data" id="btnSubmit">
    </form>
    <span id="output"> </span>{{-- resopse show karane k liye --}}
    <script>
        $(document).ready(function(){//jquery
            $("#update-form").submit(function(event){
                event.preventDefault();//form submit nhi hoga
                var form = $("#update-form")[0];//form ka object banane k liye
                var dt = new FormData(form);//form m se data nikalne k liye
                $("#btnSubmit").prop("disabled",true);//submit button disable karne k liye
                    $.ajax({
                        type:"POST",
                        url:"{{route('updated')}}",
                        data:dt,
                        processData:false,
                        contentType:false,
                        success:function(data){
                            $("#output").text(data.res);//response show karane k liye
                            $("#btnSubmit").prop("disabled",false);//button  enable ho jaye
                            $("input[type='text']").val('');//box khali ho jaye
                            $("input[type='email']").val('');//box khali ho jaye
                            window.open("/read","_self");//redirection of the page
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
</html>
