<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Welcome Create Your Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="redirect.php" enctype="multipart/form-data" method="post">
          <div class="mb-3">
            <label for="maill" class="col-form-label">Enter Email</label>
            <input type="email" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="Username" class="col-form-label">Enter Username</label>
            <input id="username" type="text" name="username" class="form-control" id="recipient-name">
            <span id="usernameError" style="color: red;"></span>
          </div>
          <div class="mb-3">
            <label for="Username" class="col-form-label">Enter Password</label>
            <input type="text" name="password" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="Username" class="col-form-label">Upload Profile Picture</label>
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" value="Upload Image" name="form2" class="btn btn-primary">Sign Up</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script>
  const username = document.getElementById('username');
  const error = document.getElementById('usernameError');
  username.addEventListener('input', function () {
    const username = username.value.trim();
    if (username !== '') {
      //here we have come because we have tyoed username
      checkAvl(username);
    }
    else {
      error.textContent = '';
    }
  });

  //function for check user avaliability
  function checkAvl(username) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'redirect.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.error) {
          usernameError.textContent = response.message;
        } else {
          usernameError.textContent = ''; // Username is available
        }
      }
    };
    xhr.send('username=' + encodeURIComponent(username));
  }
</script>