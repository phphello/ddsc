<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!--<form method="POST" action="{{route('test4')}}">
    @csrf-->
   <div>
姓名:
<input type="text" id="name"/>
密码:
<input type="text" id="password"/>
<input type="button" value="提交" onclick="create()">
</div>
<!--</form>-->
<!--<input id="csrf" hidden="hidden" value="{{ csrf_token() }}"/>-->


<script>
function create(){
    var name = $("#name").val();
    alert(name);
    var password = $("#password").val();
    var csrf = $("#csrf").val();
    $.ajax({
        url:"{{route('test4')}}",
        type:'post',
        dataType:'json',
        data:{
            name:name,
            password:password,
            _token:'{{csrf_token()}}'
        },
        success:function(data){
            console.log(data);
        },error:function(res){
            console.log(res);
        }
    });
}

</script>