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
              <label for="text_file">Text File</label>
              <input id="file" type="file" name="text_file" accept=".txt"/>
              <label for="pdf_file">PDF File</label>
              <input id="file" type="file" name="pdf_file" accept=".pdf"/>
              <label for="pdf_file">Audio File</label>
              <input id="file" type="file" name="audio_file" accept=".mp3"/>
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

  <!-- <script>
  document.querySelector('#file').addEventListener('change', function(event) {
      const fileName = event.target.files.length > 0 ? event.target.files[0].name : 'No file chosen';
      document.querySelector('.file-name').textContent = fileName;
    });
  </script> -->
</body>
</html>