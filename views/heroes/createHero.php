<?php

echo "
<div class='container'>
<form action='?controller=heroes&action=submitHero' method='post' id='createHero' class='d-flex flex-column'>
<label for='heroName' class='form-label'>Name:</label>
<input required type='text' name='heroName' id='heroName' class='form-control short-form'>
<label for='heroType' class='form-label mt-3'>Hero type:</label>
<select name='heroType' id='heroType' class='form-select short-form'>
    <option value='Demigod'>Demigod</option>
    <option value='Human'>Human</option>
</select>
<label for='heroPower' class='form-label mt-3'>Powers:</label>
<input required type='text' name='heroPower' id='heroPower' class='form-control long-form'>
<label for='heroHome' class='form-label mt-3'>Home:</label>
<input required type='text' name='heroHome' id='heroHome' class='form-control short-form'>
<div class='mt-3 d-flex align-items-center'>
    <div>
        <label for='heroMother' class='form-label'>Mother:</label>
        <input required type='text' name='heroMother' id='heroMother' class='form-control short-form'>
    </div>
    <div class='ms-5'>
        <label for='heroFather' class='form-label'>Father:</label>
        <input required type='text' name='heroFather' id='heroFather' class='form-control short-form'>
    </div>
</div>
<input type='submit' value='Submit hero' id='heroSubmit' name='heroSubmit' class='btn btn-secondary short-form mt-5'>
</form>
</div>
";
