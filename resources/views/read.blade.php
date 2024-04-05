<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <span id="output"></span>
<h1>Avilable Data</h1>
<table border="2" id="student-table">
    <tr>
        <th>S.No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
</table>

{{-- Read J Query --}}
<script>
    $(document).ready(function(){
        $.ajax({
            type:"GET",
            url:"{{ route('read') }}",
            success:function(dt){
                if(dt.data.length>0){
                    for(let $i=0;$i<dt.data.length;$i++){
                        $("#student-table").append(`<tr>
                            <td>`+($i+1)+`</td>
                            <td>`+(dt.data[$i]['id'])+`</td>
                            <td>`+(dt.data[$i]['name'])+`</td>
                            <td>`+(dt.data[$i]['email'])+`</td>
                            <td> <form action="{{url('update')}}/`+(dt.data[$i]['id'])+`" method="get"><button>Edit</button></form></td>
                            <td><form class="deleteData" data-id=`+(dt.data[$i]['id'])+`>@csrf<button type="button">Delete</button></form></td>
                            </tr>`);
                    }
                }
                else{
                    $("#student-table").append("<tr><td>Data Not Found</td></tr>");
                }
            },
            error:function(err){
                console.log(err.responseText);
            }
        })
    })
</script>
{{-- Delete J Query --}}
<script>
    $("#student-table").on("click",".deleteData",function(){
        var id = $(this).attr("data-id");
        var obj = $(this);
        $.ajax({
            type:"GET",
            url:"delete/"+id,
            success:function(data){
                $(obj).parent().parent().remove();
                $("#output").text(data.result);
            },
            error:function(err){
                console.log(err.responseText);
            }
        })
    })
</script>
</body>
</html>
