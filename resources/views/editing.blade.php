<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Изменение данных</title>
</head>
<body>
<form method='post'>
    @csrf
<div>Имя:</div>
<?php if(isset($_POST["firstname"])&&(strlen($_POST["firstname"])<1)):?>
<div style=color:red>Введите имя</div>
<input type='text' name='firstname' style='background-color:red' value=<?=$row['firstname']?>></br>
<?php elseif (isset($_POST["firstname"])&&preg_match("/[^А-ЯЁа-яё]/u", $_POST["firstname"])):?>
<div style=color:red>Недопустимые символы в имени!</div>
<input type='text' name='firstname' style='background-color:red' value=<?=$row['firstname']?>></br>
<?php else:?>
<input type='text' name='firstname' value=<?=$row['firstname']?>></br>
<?php endif; ?>

<div>Фамилия:</div>
<?php if(isset($_POST["secondname"])&&(strlen($_POST["secondname"])<1)):?>
<div style=color:red>Введите фамилию</div>
<input type='text' name='secondname' style='background-color:red' value=<?=$row['secondname']?>>
<?php elseif (isset($_POST["secondname"])&&preg_match("/[^А-ЯЁа-яё]/u", $_POST["secondname"])):?>
<div style=color:red>Недопустимые символы в фамилии!</div>
<input type='text' name='secondname' style='background-color:red' value=<?=$row['secondname']?>></br>
<?php else:?>
<input type='text' name='secondname' value=<?=$row['secondname']?>>
<?php endif; ?>

<div>Пол:</div>
<?php if($row['sex']=='male'):?>
<input type='radio' name='sex' value='male' checked > Мужской<br>
<input type='radio' name='sex' value='female'> Женский<br>";
<?php else:?>
<input type='radio' name='sex' value='male'  > Мужской<br>
<input type='radio' name='sex' value='female' checked> Женский<br>
<?php endif; ?>

<div>Номер группы:</div>
<?php if((isset($_POST["number"]))&&((mb_strlen($_POST["number"])<2)or(mb_strlen($_POST["number"])>5))):?>
<div style=color:red>Номер группы должен содержать от 2 до 5 цифр или букв</div>
<input type='text' name='number' style='background-color:red' value=<?=$row['groupid']?>></br>
<?php elseif (isset($_POST["number"])&&preg_match("/[^А-ЯЁа-яё0-9]/u", $_POST["number"])):?>
<div style=color:red>Недопустимые символы в названии группы!</div>
<input type='text' name='number' style='background-color:red' value=<?=$row['groupid']?>></br>
<?php else:?>
<input type='text' name='number' value=<?=$row['groupid']?>></br>
<?php endif; ?>

<div>E-mail:</div>
<?php if((isset($_POST["email"]))&&(mb_strlen($_POST["email"])<1)):?>
<div style=color:red>Введи свой уникальный e-mail</div>
<input type='email' name='email' style='background-color:red' value=<?=$row['email']?>></br>
<?php else:?>
<input type='email' name='email' value=<?=$row['email']?>></br>
<?php endif; ?>

<div>ЕГЭ:</div>
<?php if((isset($_POST["ege"]))&&((mb_strlen((string)$_POST["ege"])<1)or(mb_strlen((string)$_POST["ege"])>3))):?>
<div style=color:red>Введите свои результаты ЕГЭ</div>
<input type='number' name='ege' style='background-color:red' value=<?=$row['ege']?>></br>

<?php else:?>
<input type='number' name='ege' value=<?=$row['ege']?>></br>
<?php endif; ?>

<div>Год рождения:</div>
<?php if((isset($_POST["date"]))&&(mb_strlen((string)$_POST["date"])<1)):?>
<div style=color:red>Введите свой год рождения</div>
<input type='number' name='date' style='background-color:red' value=<?=$row['date']?>></br>
<?php else:?>
<input type='number' name='date' value=<?=$row['date']?>></br>
<?php endif; ?>

<?php if($row['place']=='moscow'):?>
<input type='radio' name='place' value='moscow' checked > Местный<br>
<input type='radio' name='place' value='other'> Иногородний<br>
<?php else:?>
<input type='radio' name='place' value='moscow'  > Местный<br>
<input type='radio' name='place' value='other' checked> Иногородний<br>
<?php endif; ?>
<input type='submit' value='Внести изменения'>

</form>
</body>
</html>