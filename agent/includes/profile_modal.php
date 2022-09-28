<!-- Add -->
<div class="modal fade" id="profile">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Business Profile</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">

        <!-- end form -->
        <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

          <div class="form-group row">
            <label for="email" class=" col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $farmer['email']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="tel" class="col-sm-2 col-form-label">Contact</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $farmer['tel']; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">


              <input type="password" class="form-control" id="password" name="password" value="<?php echo $farmer['password']; ?>">

            </div>
          </div>
          <div class="form-group row">
            <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
            <div class="col-sm-10">


              <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $farmer['firstName']; ?>">

            </div>
          </div>
          <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
            <div class="col-sm-10">


              <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $farmer['lastName']; ?>">

            </div>
          </div>
          <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
            <div class="col-sm-10">


              <input type="file" id="photo" name="photo">

            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="shopName" class="col-sm-2 col-form-label">Business Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="shopName" name="shopName" value="<?php echo $farmer['shopName']; ?>">

            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" name="address" value="<?php echo $farmer['address']; ?>">
            </div>
          </div>

      
    <div class="form-group row">
      <label for="address" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="address" name="description" value="<?php echo $farmer['description']; ?>"><?php echo $farmer['description']; ?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <label for="shopPhoto" class="col-sm-2 col-form-label">Business Logo:</label>
      <div class="col-sm-10">
        <input type="file" id="shopPhoto" name="shopPhoto">
      </div>
    </div>

    <hr>
    <div class="form-group row">
      <label for="curr_password" class="col-sm-2 col-form-label">Current Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
      </div>
    </div>

  
</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
  <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
  </form>
</div>
</div>
</div>
</div>