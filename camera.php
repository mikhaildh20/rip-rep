<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture Image from Camera</title>
</head>
<body>
    <h1>Capture Image</h1>
    
    <!-- Video element to show the camera stream -->
    <video id="video" width="320" height="240" autoplay></video>
    <button id="capture">Capture</button>
    <canvas id="canvas" style="display:none;"></canvas> <!-- Canvas to draw the image -->
    <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="image" id="imageData">
        <input type="submit" value="Upload Image">
    </form>

    <script>
        // Get access to the camera
        const video = document.getElementById('video');
        const captureButton = document.getElementById('capture');
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        const imageInput = document.getElementById('imageData');
        
        // Start the camera stream
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function (err) {
                console.log("Error: " + err);
            });

        // Capture the image when the capture button is pressed
        captureButton.addEventListener('click', function () {
            // Draw the current video frame onto the canvas
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Convert the image to data URL and store in hidden input field
            const dataURL = canvas.toDataURL('image/png');
            imageInput.value = dataURL;

            // Optionally, you can preview the captured image in an <img> tag
            // const img = document.createElement('img');
            // img.src = dataURL;
            // document.body.appendChild(img);
        });
    </script>
</body>
</html>
