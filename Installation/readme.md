# Installation
This is the installation guide for Smart Target

## Update the Microcontroller Code
To set up the microcontroller connection, follow these steps:

1. **Download the code in [Arduino folder](/Arduino/SmartTarget.ino)**
2. **Edit the SSID info :**
    - SSID name
    - SSID password 
    - Host IP
3. **Upload to microcontroller***

> [!IMPORTANT] 
> Ensure that the microcontroller uses the same network connection as the Host.
Here's a revised version that is more understandable:

---

## Backend and Frontend Setup

To set up the web interface, follow these steps:

1. **Download and Install Required Software:**
    - Install [XAMPP](https://www.apachefriends.org/index.html).
    - Install [Node.js](https://nodejs.org/).
    - Install [Visual Studio Code (VS Code)](https://code.visualstudio.com/).
    
    > [!IMPORTANT]  
    > Ensure that MySQL is installed in XAMPP.

2. **Set Up the Project Folder:**
    - Create a new folder inside the `htdocs` directory within your XAMPP installation folder.

3. **Download and Place the Project Files:**
    - Download the [Frontend folder](/Frontend) and [Backend folder](/Backend).
    - Move both folders into the newly created folder inside `htdocs`.

4. **Install Backend Dependencies:**
    - Open the new project folder in VS Code.
    - Open the terminal in VS Code and navigate to the Backend directory:
      ```bash
      cd Backend
      ```
    - Install the necessary Node.js packages by running:
      ```bash
      npm install express body-parser cors mysql2
      ```
    - To start the backend server, run:
      ```bash
      node server.js
      ```

    > [!NOTE]  
    > Make sure you are in the `Backend` directory when starting the server.

5. **Configure XAMPP:**
    - Open the XAMPP Control Panel.
    - Click on `Config` next to Apache, then select `PHP (php.ini)`.
    - Find the lines `;extension=intl` and `;extension=gd`, and remove the semicolons (`;`) at the beginning of these lines.
    - Save and close the file.

6. **Start Apache and MySQL:**
    - In the XAMPP Control Panel, click `Start` for both Apache and MySQL.
    - Click `Admin` for MySQL, which will open phpMyAdmin.
    - Create a new database and name it `ta_smarttarget`.
    - Download the [Database template]([/ta_smarttarget (7).sql](https://github.com/A-ARahman/TA-SmartTarget/blob/main/ta_smarttarget%20(7).sql)) and import it into the `ta_smarttarget` database.

7. **Access the Web Interface:**
    - Open your web browser and go to: `http://localhost/"Your New Folder Name"/Frontend/Dashboard.php`.

---

This version should be clearer and easier to follow. Let me know if you need any more changes!
