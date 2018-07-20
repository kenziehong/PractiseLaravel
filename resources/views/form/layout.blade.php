{!!Form::open()!!}
{!!Form::label('hoten','Họ Tên')!!}
{!!Form::text('txthoten','',array('class'=>'input','placehoder'=>'Vui lòng nhập Họ Tên'))!!} 
{!!Form::label('matkhau','Mật khẩu')!!}
{!!Form::password('txtmatkhau',['class' => 'input'])!!} 
{!!Form::label('email','Email')!!}
<!-- {!!Form::email('txtemail,'',array('class' => 'input')!!}  -->
{!!Form::close()!!}

<!-- https://laravelcollective.com/docs/5.0/html
https://www.youtube.com/watch?v=dJG8-B6ot1s&index=36&list=PLqEKeWbzk0aTloUonoi7J_D6QslCc9VXv

ErrorException in 3e096f7bf2e9cc8d85eb19997429635af87bf435.php line 11:
Parse error: syntax error, unexpected '',array('' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ')' (View: C:\xampp\htdocs\cms\resources\views\form\layout.blade.php)
 -->
