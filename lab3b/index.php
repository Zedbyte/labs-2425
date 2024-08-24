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
        <form method="POST" action="uploaded.php" enctype="multipart/form-data">
          <h3 style="text-align:center;">Select File Type:</h3>
          <select name="file_type" id="file_type" required>
            <option value="">Select File Type</option>
            <option value="pdf">PDF</option>
            <option value="audio">Audio</option>
            <option value="image">Image</option>
            <option value="video">Video</option>
          </select>
          <h3 style="text-align:center;">Upload File</h3>
          <form method="POST" action="uploaded.php" enctype="multipart/form-data">
              <label for="text_file">Text File</label>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
              <input id="file" type="file" name="text_file" accept=".txt" multiple/>
              <label for="pdf_file">PDF File</label>
              <input id="file" type="file" name="pdf_file" accept=".pdf" multiple/>
=======
=======
>>>>>>> image-file-upload
=======
>>>>>>> video-file-upload
              <input id="file" type="file" name="text_file" accept=".txt"/>
              <label for="pdf_file">PDF File</label>
              <input id="file" type="file" name="pdf_file" accept=".pdf"/>
              <label for="pdf_file">Audio File</label>
              <input id="file" type="file" name="audio_file" accept=".mp3"/>
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> audio-file-upload
=======
              <label for="image_file">Image File</label>
              <input id="file" type="file" name="image_file" accept="image/*"/>
>>>>>>> image-file-upload
=======
              <label for="image_file">Image File</label>
              <input id="file" type="file" name="image_file" accept="image/*"/>
              <label for="video_file">Video File</label>
              <input id="file" type="file" name="video_file" accept=".mp4"/>
>>>>>>> video-file-upload
            </label>
              <p class="file-name" id="file-name">No file chosen</p>
            <br>
            <button type="submit" class="button">Upload</button>
          </form>
        </div>
      </div>

      <div class="col-6" style="display: flex; justify-content:center;">
        <img src="https://www.auf.edu.ph/home/images/mascot/CCS.png" alt="College of Computing Studies" width="100%">
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