# 🚀 Hostinger Deployment Guide (ClassicWeld)

Follow these steps to put your website live on Hostinger Single Web Hosting.

### Step 1: Prepare the Files
1.  **Zip the entire `classicweld` folder** on your computer.
2.  Make sure you include the hidden files like `.env` and `.htaccess`.

### Step 2: Upload to Hostinger
1.  Log in to your **Hostinger hPanel**.
2.  Go to **File Manager**.
3.  Navigate to the `public_html` folder.
4.  **Upload** your `classicweld.zip` file here.
5.  **Extract** the zip file directly into `public_html`.
6.  *Ensure all files (app, public, resources, etc.) are directly inside `public_html`, not inside another subfolder.*

### Step 3: Configure the Database
1.  In Hostinger, go to **Databases** -> **MySQL Databases**.
2.  Create a new database (e.g., `u123_classicweld`).
3.  Create a new user and password.
4.  Open the `.env` file in the Hostinger File Manager and update these lines:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

### Step 4: Finalize (The "Magic" Step)
Since you don't have SSH/Terminal access, I have created a special helper script for you:
1.  Open your browser and go to: `https://yourdomain.com/install.php`
2.  Wait for the page to load. It will automatically run your database migrations and clear the cache for you.
3.  **IMPORTANT:** Once it says "Done!", immediately delete the `install.php` file from your Hostinger File Manager for security.

### Step 5: Image Upload Permissions
Right-click the folder `public/api/uploads` in File Manager and set permissions to **775** or **755** so your admin panel can save new product images.
