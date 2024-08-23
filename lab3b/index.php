<?php

  require './partials/header.php'

?>
<body>
  <header>
    <div class="container">
      <div class="flex">
        <img class="logo" src="https://www.auf.edu.ph/home/images/logo2.png" alt="Angeles University Foundation">
      </div>
    </div>
  </header>
  
  <main class="container">
    <div class="background-blur"></div>
    <div class="grid">
      <div class="col-6">
        <div class="card">
          <h3 style="text-align:center;">Upload File</h3>
          <form method="POST" action="uploaded.php" enctype="multipart/form-data">
            <label for="file" class="file-upload-label">
              <div class="file-upload-design">
                <svg viewBox="0 0 640 512" height="1em">
                  <path
                    d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"
                  ></path>
                </svg>
                <p>Drag and Drop</p>
                <p>or</p>
                <span class="browse-button">Browse file</span>
              </div>
              <input id="file" type="file" name="image_file" accept="image/*" multiple/>
            </label>
              <p class="file-name" id="file-name">No file chosen</p>
            <br>
            <button type="submit" class="button">Upload</button>
          </form>
        </div>
      </div>

      <div class="col-6" style="display: flex; justify-content:center;">
        <img src="https://www.auf.edu.ph/home/images/mascot/CCS.png" alt="College of Computing Studies" width="600">
      </div>
    </div>
  </main>

  <script>
  document.querySelector('#file').addEventListener('change', function(event) {
      const fileName = event.target.files.length > 0 ? event.target.files[0].name : 'No file chosen';
      document.querySelector('.file-name').textContent = fileName;
    });
  </script>
</body>
</html>
