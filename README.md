# CT Scan Preprocessing for Ischemic Stroke Detection

**Acute Ischemic Stroke** is caused by the lack of blood supply entering the brain, reducing neurological functions, with **1 out of 3 cases** causing **death**.

This image preprocessor allows you to enhance your CT scan **image resolution** and **quality** for you to provide the most **accurate diagnostics and suitable treatments**.

## Installation prerequisites

You will require an installation of **PHP 7.4.x or later**, as well as **Composer** and **NPM**. Installation instructions varies across different operating systems, so make sure to check out the instructions to install these software for your operating system.

You will also require MySQL, in which a separate section will be dedicated to installation instructions.

### Windows

Please ensure that you are using **Windows 7 or later**. Make sure that you have the **Microsoft Visual C++ Redistributable for Visual Studio 2019** downloaded; otherwise, download it [here](https://visualstudio.microsoft.com/downloads/). **You only need to download the runtime library, NOT the entire Visual Studio IDE**.

Download the appropriate version of PHP [here](https://windows.php.net/download/). Choose the version that is suitable with the architecture of your system (i.e. 32-bit (x86) installation for 32-bit systems, and either 32 or 64-bit installation for 64 bit systems). Download the zipped folder containing the **pre-compiled binaries** (**not** the source code) and extract it to a location of your choice.

Before we install Composer, update your ```PATH``` variable so that you can call ```php``` in the terminal. To do this, press <kbd>⊞ Win</kbd> + <kbd>R</kbd> to bring up the Run dialog box, type in **sysdm.cpl**, then hit <kbd>↵ Enter</kbd>. A **System Properties** dialog box should appear. Go to the **Advanced** tab, and click on **Environment Variables**. There will be two ```PATH```s, one under the category **User variables for ```%USERNAME%```** (where ```%USERNAME%``` is your Windows user account name), and another under **System variables**.

- If you want to install PHP for all users (recommended), update the ```PATH``` under **System variables**.
- Otherwise, if you want to use PHP for your own user account, update the ```PATH``` under **User variables for ```%USERNAME%```**

Double-click on one of the ```PATH``` variables above, then click **New** in the dialog box that appears. Enter the location of the folder you extracted PHP earlier. For example, if you install PHP in ```C:\path\to\your\php\php-8.0.3-Win32-vs16-x64```, then add this location to the ```PATH```. Click **OK** to dismiss all dialog boxes.

Open a new terminal window (Bash, Command Prompt or PowerShell will work). If you already have a terminal window open prior to setting your ```PATH```, close it and relaunch the terminal. Run this command to verify the installation:

```bat
php --version
```

If you set your ```PATH``` correctly, it will print the PHP version that you just installed.

Download the Composer installer [here](https://getcomposer.org/Composer-Setup.exe) and follow the instructions on-screen. Use the recommended settings in the installer.

Download Node.js [here](https://nodejs.org). Again, run the installer and follow the instructions on-screen. This will automatically install ```npm```.

The Composer and Node.js installers will set the ```PATH```s of ```composer``` and ```npm``` by default.

Before running the install script, go to the installation folder of PHP and add this line to ```php.ini```, if not already added:

```ini
extension="php-fileinfo.dll"
```

### Linux (including WSL)

Install PHP, Composer and Node.js using the appropriate package manager for your Linux distribution. For example, in Debian-based distros (including Ubuntu), run this command:

```sh
sudo apt-get update
sudo apt-get install php composer nodejs
```

Instructions may vary across different Linux distributions.

### macOS (also works for Linux, including WSL)

Install Homebrew [here](https://brew.sh). If your are using Linux or WSL, refer to [here](https://docs.brew.sh/Homebrew-on-Linux).

Run the following commands

```sh
brew install php
brew install composer
brew install nodejs
```

## Installing and setting up MySQL

The MySQL database is configured to connect at ```localhost:3306```. If you are using a different port, set the port accordingly in the ```.env``` file.

### Windows

Follow the instructions [here](https://dev.mysql.com/doc/refman/8.0/en/windows-installation.html).

### macOS and Linux (including WSL)

Install Homebrew (see the section above). Then, run the following command:

```sh
brew install mysql
```

This project does not set a root password by default, so if you are installing MySQL for the first time, ignore the warning regarding not setting a root password. If you have already installed MySQL with a root password, simply change the ```DB_PASSWORD``` property of the ```.env``` file.

If you are using Ubuntu, or using WSL with an Ubuntu image, newer versions of MySQL installed through ```sudo apt-get install mysql-server``` may require the user to authenticate using ```sudo``` for the root user. This may cause problems with applications trying to authenticate as the MySQL root user. Therefore, do not use ```apt-get``` to install MySQL and use Homebrew to install it instead.

Start the MySQL server with this command:

```sh
mysql.server start
```

Log into the MySQL server with this command:

```sh
mysql -u root
```

A MySQL prompt should appear. You can then create the database for this application:

```sql
CREATE DATABASE web_app
```

It can be helpful to connect to a frontend GUI to manage the database. You can use LibreOffice Base (should be pre-installed in many Linux distributions) or Microsoft Access (only for Windows users).

To stop the MySQL server, run this command:

```sh
mysql.server stop
```

## Build and install

After cloning the repository, execute one of the following **from within the local repository folder**, depending on which terminal you use:

- ```INSTALL.sh``` if you are using a Bash environment,
- ```INSTALL.bat``` if you are using the Windows Command Prompt, or
- ```INSTALL.ps1``` if you are using PowerShell.

## Run

To run the web application, use the following command:

```sh
php artisan serve
```
