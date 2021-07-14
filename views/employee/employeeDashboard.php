<div class="container mt-5">
  <div class="row  border">
    <div class="col-2 text-center border">
      <h5>Employee no</h5>
    </div>
    <div class="col-2 text-center border">
      <h5>Name</h5>
    </div>
    <div class="col-2 text-center border">
      <h5>Last name</h5>
    </div>
    <div class="col-2 text-center border">
      <h5>Birth date</h5>
    </div>
    <div class="col-2 text-center border">
      <h5>Hire date</h5>
    </div>
    <div class="col-2 text-center border">
      <h5>Gender</h5>
    </div>
  </div>
  <?php foreach ($allEmployees as $employee) : ?>
    <div class="row">
      <div class="col-2 text-center border">
        <p><?= $employee["emp_no"] ?></p>
      </div>
      <div class="col-2 text-center border">
        <p><?= $employee["first_name"] ?></p>
      </div>
      <div class="col-2 text-center border">
        <p><?= $employee["last_name"] ?></p>
      </div>
      <div class="col-2 text-center border">
        <p><?= $employee["birth_date"] ?></p>
      </div>
      <div class="col-2 text-center border">
        <p><?= $employee["hire_date"] ?></p>
      </div>
      <div class="col-2 text-center border">
        <p><?= $employee["gender"] ?></p>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="col-2 text-center mt-3">
    <a href="./index.php" class="btn btn-primary w-100">Back</a>
  </div>
</div>