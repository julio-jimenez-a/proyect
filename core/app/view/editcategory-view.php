<?php $user = CategoryData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-14">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Area</h4>
  </div>
  <div class="card-content table-responsive">


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Area</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>