document.querySelector("#file").addEventListener("change", function (event) {
    const fileName =
      event.target.files.length > 0
        ? event.target.files[0].name
        : "No file chosen";
    document.querySelector(".file-name").textContent = fileName;
  });

document.addEventListener("DOMContentLoaded", () => {
  const fileTypeSelect = document.getElementById("file_type");
  const fileInput = document.getElementById("file");

  // Event listener for updating the accepted file types
  fileTypeSelect.addEventListener("change", () => {
    let acceptTypes = "";

    switch (fileTypeSelect.value) {
      case "pdf":
        acceptTypes = ".pdf";
        break;
      case "audio":
        acceptTypes = "audio/*";
        break;
      case "image":
        acceptTypes = "image/*";
        break;
      case "video":
        acceptTypes = "video/*";
        break;
      default:
        acceptTypes = "";
    }

    fileInput.accept = acceptTypes;
  });

  // Event listener for validating the file type
  fileInput.addEventListener("change", () => {
    const fileType = fileTypeSelect.value;
    const file = fileInput.files[0];

    if (file) {
      const fileType = file.type;

      let isValid = false;
      switch (fileTypeSelect.value) {
        case "pdf":
          isValid = fileType === "application/pdf";
          break;
        case "audio":
          isValid = fileType.startsWith("audio/");
          break;
        case "image":
          isValid = fileType.startsWith("image/");
          break;
        case "video":
          isValid = fileType.startsWith("video/");
          break;
        default:
          isValid = false;
      }

      if (!isValid) {
        alert("The uploaded file does not match the selected file type.");
        fileInput.value = ""; // Reset the file input
      }
    }
  });
});

