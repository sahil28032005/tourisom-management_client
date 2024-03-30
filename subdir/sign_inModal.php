
<div class="modal fade" id="sign_inModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">User Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="redirect.php" method="post">
              <div class="mb-3">
                <label for="name"   class="col-form-label">Enter Username</label>
                <input name="signuname" type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="Username"   class="col-form-label">Enter Password</label>
                <input name="signpass" type="password" class="form-control" id="recipient-name">
              </div>
              <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  kahi arth nahiye thevnyat-->
            <button type="submit" name="form1" class="btn btn-primary">Sign In</button>
          </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  
 
