<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<form   method="post">
    @csrf
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
<div>Имя:</div>
<?php if(isset($firstname)&&(strlen($firstname)<1)): ?>
<div style=color:red>Введите имя</div>
<input type='text' name='firstname' style='background-color:red' value="{{old('firstname')}}"></br>
<?php elseif (isset($firstname)
&&preg_match("/[^А-ЯЁа-яё]/u", $_POST["firstname"])): ?>
<div style=color:red>Недопустимые символы в имени!</div>
<input type='text' name='firstname' style='background-color:red' value="{{old('firstname')}}"></br>	
<?php else: ?>
<input type='text' name='firstname' value="{{old('firstname')}}"></br>
<?php endif; ?>

<div>Фамилия:</div>
<?php if(isset($secondname)&&(strlen($secondname)<1)): ?>
<div style=color:red>Введите фамилию</div>
<input type='text' name='secondname' style='background-color:red' value="{{old('secondname')}}"></br>
<?php elseif (isset($secondname)
&&preg_match("/[^А-ЯЁа-яё]/u", $_POST["secondname"])): ?>
<div style=color:red>Недопустимые символы в фамилии!</div>
<input type='text' name='secondname' style='background-color:red' value="{{old('secondname')}}"></br>	
<?php else: ?>
<input type='text' name='secondname' value="{{old('secondname')}}"></br>
<?php endif; ?>

<div>Пол</div>
<input type="radio" name="sex" value="male" checked > Мужской<br>
<input type="radio" name="sex" value="female"> Женский<br>

<div>Номер группы:</div>
<?php if((isset($number))
&&((mb_strlen($number)<2)or(mb_strlen($number)>5))): ?>
<div style=color:red>Номер группы должен содержать от 2 до 5 цифр или букв</div>
<input type='text' name='number' style='background-color:red' value="{{old('number')}}"></br>
<?php elseif (isset($number)
&&preg_match("/[^А-ЯЁа-яё0-9]/u", $number)): ?>
<div style=color:red>Недопустимые символы в названии группы!</div>
<input type='text' name='number' style='background-color:red' value="{{old('number')}}"></br>
<?php else: ?>
<input type='text' name='number' value="{{old('number')}}"></br>
<?php endif; ?>

<div>E-mail:</div>
<?php if((isset($_POST["email"]))&&(mb_strlen($_POST["email"])<1)): ?>
<div style=color:red>Введи свой уникальный e-mail</div>
<input type='email' name='email' style='background-color:red' value="{{old('email')}}"></br>
<?php else: ?>
<input type='email' name='email' value="{{old('email')}}"></br>
<?php endif;?>

<div>ЕГЭ:</div>
<?php if((isset($_POST["ege"]))&&((mb_strlen((string)$_POST["ege"])<1)
or(mb_strlen((string)$_POST["ege"])>3))):?>
<div style=color:red>Введите свои результаты ЕГЭ</div>
<input type='number' name='ege' style='background-color:red' value="{{old('ege')}}"></br>
<?php else: ?>
<input type='number' name='ege' value="{{old('ege')}}"></br>
<?php endif;?>

<div>Год рождения:</div>
<?php if((isset($_POST["date"]))&&(mb_strlen((string)$_POST["date"])<1)): ?>
<div style=color:red>Введите свой год рождения</div>
<input type='number' name='date' style='background-color:red' value="{{old('date')}}"></br>
<?php else: ?>
<input type='number' name='date' value="{{old('date')}}"></br>
<?php endif; ?>




<input type='radio' name='place' value='moscow' checked> Местный<br>
<input type='radio' name='place' value='other'> Иногородний<br>
 
 <input type='submit' value='Зарегистрироваться'>
</form>

</body>
</html>