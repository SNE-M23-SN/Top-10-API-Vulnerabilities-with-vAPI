:::success
# Exploiting the Top 10 API Vulnerabilities with vAPI

### Author: **==`Khasan Abdurakhmanov`==**  <img src="https://s3.hedgedoc.org/demo/uploads/6c1efc05-f895-4c1c-ba07-bdc74576a8ac.jpeg" style="border-radius: 50%; width: 50px; height: 50px;" alt="Author's Avatar">
### Affiliation: **==`Innopolis University`==** <img src="https://s3.hedgedoc.org/demo/uploads/20b271a1-6fac-4409-8829-f85d8da2c9fe.jpeg" style="border-radius: 50%; width: 50px; height: 50px;" alt="Author's Avatar">

:::

****TABLE OF CONTENTS****

[TOC]


## Introduction

The **OWASP API Security Top 10** highlights the most critical **API** security risks that developers and organizations should be aware of. This guide provides a walkthrough for exploiting these vulnerabilities using **vAPI**, a self-hosted **PHP** interface designed to replicate **OWASP API Top 10** scenarios through exercises. **vAPI**, available on **GitHub** at **https://github.com/roottusk/vapi**, can be easily set up by following the instructions in the ==`README.md`== file. The walkthrough covers how to configure **Postman** and other tools to test the various **API** vulnerabilities.

## Tools and Setup

In order to gain a comprehensive understanding of the vulnerabilities you are dealing with and to exploit them effectively, it is imperative to have a collection of specific tools at your disposal. Here is a list of the essential tools you will need:

1. **Postman**

    **Postman** has garnered popularity as a highly effective tool for testing **APIs**. It provides an intuitive user interface that allows you to easily send **HTTP** requests and closely examine the responses you receive. You have the option to use either the *desktop* application or the *web* version, depending on your preference.
    <center>

    ![](https://s3.hedgedoc.org/demo/uploads/6e2f08e3-dcb0-44b2-81f5-4436eddd088a.png)
    </center>

- **[Desktop Version](https://www.postman.com/downloads/)**: You can download the **Postman** desktop application for a more robust and responsive interaction.
- **[Web Version](https://web.postman.co/home)**: If you prefer a more lightweight approach, you can use the **Postman for Web**.

---
2. **Docker**

    **Docker** is a platform that has gained wide acceptance for *containerization*. It greatly simplifies the process of managing and deploying applications in containers, making it a vital tool for any developer.
    
    <center>

    ![](https://s3.hedgedoc.org/demo/uploads/5c77954c-b37b-4175-b460-37ceaf22e80a.png)

    </center>

- **[Install Docker](https://docs.docker.com/engine/install/)**: You can follow the detailed instructions provided on the **Docker** website to install **Docker** on your system. This will ensure that you have the latest and most secure version.

---

3. **Burp Suite**

    **Burp Suite** is a formidable tool in the realm of *web application security testing*. It offers a wide array of features, suitable for both manual and automated testing. It plays a vital role in intercepting and analyzing **HTTP** requests and responses, making it indispensable for security testing.
    
    <center>

    ![](https://s3.hedgedoc.org/demo/uploads/f1a9bd77-e747-4df5-bf3d-67f0ea797b93.png)    

    </center>

- **[Download Burp Suite](https://portswigger.net/burp/documentation/desktop/getting-started/download-and-install)**: You can download the **Burp Suite Community Edition** for a comprehensive web application security testing toolkit.

---
**Postman** and **Burp Suite** are both popular tools used for **API** testing, but they serve different purposes:

- **==Postman==** is primarily used for *building, testing*, and documenting *APIs*. It provides a user-friendly interface for creating API requests, managing environments, and collaborating with team members.

- **==Burp Suite==** is a comprehensive *web application security testing platform*. While it can be used for *API testing*, its main focus is on identifying vulnerabilities in web applications, including those exposed through APIs.

Combining **Postman** and **Burp Suite** in this guide can be beneficial for the following reasons:

1. **Postman** can be used to create and execute *API requests*, while **Burp Suite** can intercept and analyze the traffic to identify potential security issues.

2. **Burp Suite** can be used to test APIs for vulnerabilities like *injection flaws*, *broken authentication*, and *security misconfigurations*, which are covered in the **OWASP API Security Top 10**.

3. Using both tools together provides a more comprehensive approach to API testing, leveraging the strengths of each tool.

**Docker** is chosen as the containerization tool in this guide for several reasons:

1. **Docker** is the most popular and widely-used containerization platform, with a large and active community.

2. **Docker** provides a consistent and reproducible environment for running applications, making it easier to set up and deploy the **vAPI** application.

3. **Docker** simplifies the management of dependencies and ensures that the application runs consistently across different environments.

In addition to **Docker**, this guide will also use **Docker Compose** to define and manage the multi-container application. **Docker Compose** allows you to define the services, networks, and volumes required for the application in a single configuration file, making it easier to set up and manage the environment.

---

## Setting Up vAPI

<center>

![](https://s3.hedgedoc.org/demo/uploads/e116b7b6-9275-40a0-b09d-8f91750d87d6.png)

</center>

There are two ways to set up **vAPI**: using **Docker Engine** or **manually**. Both methods are detailed below.

### Method 1: Using Docker Engine

1. **Clone the vAPI Repository**
First, clone the **vAPI** repository from **GitHub** to your local machine:

<center>

![](https://s3.hedgedoc.org/demo/uploads/a334e072-e2c1-4439-8727-b1245eb34cda.png)

![](https://s3.hedgedoc.org/demo/uploads/06e81f33-b9b5-4868-919b-ba27698a64d9.png)

</center>

```bash=
git clone https://github.com/roottusk/vapi.git
cd vapi
```

2. **Build and Run the vAPI Container**
Use **Docker Compose** to build and run the **vAPI** container:

```bash=
docker-compose up -d
```

<center>

![](https://s3.hedgedoc.org/demo/uploads/236f3298-9e6c-4843-832a-37110c76b5d5.png)

    
![](https://s3.hedgedoc.org/demo/uploads/5cf44bd5-ad2f-4b62-b3db-a898f0b44816.png)

</center>

3. **Access vAPI**
Open http://localhost:80 in your web browser to access the **vAPI** interface.

<center>

![](https://s3.hedgedoc.org/demo/uploads/bc5c84bd-f7f8-467a-bcbe-9904e9c7e743.png)

</center>

---

### Method 2: Setting Up vAPI Manually

:::warning
**Prerequisites**:
:::

* ==`PHP`==: Make sure you have **PHP** installed on your system. The recommended version is ==`PHP 7.3`== or higher.
* ==`Composer`==: **Laravel** uses **Composer** to manage its dependencies, so you'll need to have ==`Composer`== installed.
* **MySQL**: The **vAPI** project uses a **MySQL** database, so you'll need to have **MySQL** installed and running.

---

1. **Clone the vAPI Repository**
First, clone the **vAPI** repository from **GitHub** to your local machine:

```bash=
git clone https://github.com/roottusk/vapi.git
cd vapi
```

<center>
    
![](https://s3.hedgedoc.org/demo/uploads/3ef57330-c79b-4f1e-9999-f65a4fff3879.png)

![](https://s3.hedgedoc.org/demo/uploads/b994a424-3398-42d4-aba5-6f749585fa41.png)

</center>


2. **Set Up the Database**

Here are the steps to create a *new user* and *database* in **MySQL**:

* **Connect to the MySQL server** as an administrative user (e.g. root):

```bash=
sudo mysql -u root
```

* **Create a new database**:

```sql==
CREATE DATABASE new_database;
```

* **Create a new user** and set a password:

```sql==
CREATE USER 'new_user'@'localhost' IDENTIFIED BY 'new_password';
```

* **Grant the new user full privileges** on the new database:

```sql==
GRANT ALL PRIVILEGES ON new_database.* TO 'new_user'@'localhost';
```

* **Flush the privileges** to apply the changes:

```sql==
FLUSH PRIVILEGES;
```

* **Exit the MySQL prompt**:

```sql==
exit
```

That's it! You have now created a new database called `new_database` and a new user called `new_user` with the password `new_password`. The user has been granted all privileges on the new database.

::: info
**A few things to note**:
:::
- Replace `new_database`, `new_user`, `localhost`, and `new_password` with your desired names and values.
- The `@'localhost'` part restricts the user to only connect from the local machine. You can use `@'%'` to allow connections from any host.
- The `FLUSH PRIVILEGES` command tells **MySQL** to reload the grant tables and apply the changes.

<center>

![](https://s3.hedgedoc.org/demo/uploads/3bcefe87-3af3-4091-b16d-739d7903fcad.png)

</center>

Next we should import ==`vapi.sql`== into our **MySQL** database:
```bash=
mysql -u your_username -p your_database < vapi.sql
```

<center>

![](https://s3.hedgedoc.org/demo/uploads/5f6587d9-f34a-4e41-a956-2a3849f1afc0.png)

</center>

3. **Configure DB Credentials**
Configure the database credentials in the ==`vapi/.env`== file with your database details.

<center>

![](https://s3.hedgedoc.org/demo/uploads/512ea90d-af75-4894-b9de-67518824c243.png)

![](https://s3.hedgedoc.org/demo/uploads/c1d5ce61-e41a-4711-81cd-6eea0227125c.png)

</center>

4. **Starting MySQL Service**
Start the MySQL service (Linux):
```bash=
sudo systemctl restart mysql.service
```

<center>

![](https://s3.hedgedoc.org/demo/uploads/0de096c0-4abe-4997-9fd1-c788e0c7798a.png)

</center>

5. **Starting Laravel Server**
Go to the **vAPI** directory and run the **Laravel** development server:

```bash=
composer update
composer install
```
This will update the project dependencies to their latest compatible versions, which may resolve some issues.

```bash=
php artisan serve --host=0.0.0.0
```
<center>

![](https://s3.hedgedoc.org/demo/uploads/11de0790-8ab4-4d4d-93db-1bd4b5e075c1.png)

![](https://s3.hedgedoc.org/demo/uploads/9d3eedf2-eb53-42ea-8e29-f209706c5874.png)



</center>


6. **Access vAPI**:

Open http://localhost:80 in your web browser to access the **vAPI** interface.

<center>

![](https://s3.hedgedoc.org/demo/uploads/0b895a50-0ec2-4bc4-9e31-ea70cc9688d6.png)
</center>

---

## Setting Up Postman

**Import Collection:**

* Import the ==`vAPI.postman_collection.json`== in **Postman**.
* Import the ==`vAPI_ENV.postman_environment.json`== in **Postman**.

**Use Public Workspace**: 
* Alternatively, you can use the public workspace: [vAPI Public Workspace](https://www.postman.com/roottusk/workspace/vapi/)

## Deployment

[Helm](https://helm.sh/) can be used to deploy to a **Kubernetes** namespace. The chart is located in the ==`vapi-chart`== folder. This chart requires a secret named ==`vapi`== with the following values:

```bash=
DB_PASSWORD: <database password to use>
DB_USERNAME: <database username to use>
```

Here is a sample **Helm Install** Command: 

```bash=
helm upgrade --install vapi ./vapi-chart --values=./vapi-chart/values.yaml`
```

- **Important**

The ==`MYSQL_ROOT_PASSWORD`== value on ==line 232== in the ==`values.yaml`== file must match the one on ==`line 184`== for the deployment to work properly.

---

## Exploiting Vulnerabilities

Let's begin our exploitation journey by examining the first vulnerability in the **OWASP API Security Top 10**:

### 1. Broken Object-Level Authorization (BOLA)

**Explanation**

In this vulnerability, a user can access data belonging to another user by manipulating a parameter, such as an ==`id`==. For example, if your user ==`ID`== is ==`5`== and you change the ==`id`== parameter to ==`6`==, you might be able to see another user's data. This type of vulnerability is known as **Insecure Direct Object References (IDOR)**.


**Steps to Exploit**
To demonstrate this vulnerability, we will use **API** endpoints that allow us to create a user and access user data using an id parameter.

1. **Creating New User**

    <center>

    ![](https://s3.hedgedoc.org/demo/uploads/1c3e81d2-8b5c-48c4-b96f-738d26e8ed05.png)

    </center>
    

Send a **POST** request to ==`/api/1/users`== with the necessary parameters to create a new user.

**Endpoint**: ==`/vapi/api1/user`==

**HTTP Method**: ==`POST`==

**Authorization**: ==`No authorization required (noauthAuth)`==

**Headers**:

* **Content-Type**: ==`application/json`==
* **Accept**: ==`application/json`==
* **Request Body**:
 ```json=
{
    "username": "alice",
    "name": "Alice",
    "course": "Computer Science",
    "password": "password123"
}
```
<center>

![](https://s3.hedgedoc.org/demo/uploads/83e7b41a-ddb2-4c1b-b9b7-7752d43ed02a.png)

![](https://s3.hedgedoc.org/demo/uploads/0aa86060-9a60-4c05-997c-26f8d7494fb5.png)

</center>

You should receive a response with the newly created user's data, including the id parameter.
```json=
{
    "id": 5,
    "username": "alice",
    "name": "Alice",
    "course": "Computer Science",
}
```

<center>

![](https://s3.hedgedoc.org/demo/uploads/367ae95b-c28b-430f-afae-7e2ddbeffd15.png)

</center>

2. **Access Your User Data**

<center>

![](https://s3.hedgedoc.org/demo/uploads/c8d97356-b449-458e-8b02-9835f3cc75a9.png)

</center>

Send a **GET** request to ==`/api/1/users/{id}`==, replacing ==`{id}`== with the id of the user you just created.

**Endpoint**: ==`/vapi/api1/user/{api1_id}`==

**HTTP Method**: ==`GET`==

**Headers**:

* **Authorization-Token**: ==`YWxpY2U6cGFzc3dvcmQxMjM=`==
* **Content-Type**: ==`application/json`==

---

To calculate the **Basic Authorization token**, follow these steps:

1. **Combine your username and password** with a colon (`:`) separator. For example, if your username is `alice` and password is `password123`, the concatenated string would be `alice:password123`.

2. **Encode the concatenated string** using Base64 encoding. You can use online tools or programming languages to perform Base64 encoding.

For the example credentials:
- Username: `alice`
- Password: `password123`

The Basic Authorization token would be:
```
YWxpY2U6cGFzc3dvcmQxMjM=
```
---

<center>

![](https://s3.hedgedoc.org/demo/uploads/6908dfd4-a876-4c75-a1bb-29f71b987757.png)


</center>

You should be able to see your own user data in the response.

**Expected Response**:
```json=
{
    "id": 5,
    "username": "alice",
    "name": "Alice",
    "course": "Computer Science",
}
```
<center>

![](https://s3.hedgedoc.org/demo/uploads/823a86c0-1f47-45f8-9cdc-c3fe6a9b2168.png)

</center>

3. **Exploit IDOR by Accessing Another User's Data**

To exploit the **IDOR** vulnerability, change the ==`id`== parameter to another value, such as ==`1`==, and send the request again.

**Endpoint**: ==`/vapi/api1/user/1`==

**HTTP Method**: ==`GET`==

**Headers**:

* **Authorization-Token**: ==`YWxpY2U6cGFzc3dvcmQxMjM=`==
* **Content-Type**: ==`application/json`==

<center>

![](https://s3.hedgedoc.org/demo/uploads/373ac0ae-3242-4a22-bad1-e0fa65e08582.png)

![](https://s3.hedgedoc.org/demo/uploads/a54dfb69-63c5-4598-ad3c-5b5ffc9279d9.png)

</center>

If you receive the data for another user, such as ==Michael== in this example, it confirms that the application is vulnerable to **IDOR**.

---

3. **Update User**

The last endpoint in ==`/vapi/api1`== is the **PUT Update user** which gives the user the facility to update the information. This is another instance of the **Broken Object Level Authorization (BOLA)** vulnerability in the **vAPI** project. This time, it's in the **PUT** endpoint for updating a user's information.

<center>

![](https://s3.hedgedoc.org/demo/uploads/9276105d-17e0-40a6-920c-bd01ed3e6788.png)

</center>

Let's go through the steps to exploit this vulnerability:

1. **Retrieve the user data you want to update**:
   - You likely used the GET `/api/1/users/{id}` endpoint to retrieve the details of the user with `id=1`.

<center>
    
![](https://s3.hedgedoc.org/demo/uploads/888e6e87-dff6-425f-8754-55da90815bbf.png)
</center>

2. **Modify the user data in the request body**:
   - You updated the user data in the request body, potentially changing the name, email, or other fields.

<center>
    
![](https://s3.hedgedoc.org/demo/uploads/6e756335-dc89-4697-9658-2452e5ee651c.png)

![](https://s3.hedgedoc.org/demo/uploads/5b59ee47-915c-4824-a317-029322cb9154.png)


</center>

3. **Send the PUT request with the modified user ID**:
   - Instead of using your own user ID in the request, you changed the `api1_id` parameter to `1`, which corresponds to the user you don't have permission to update.

<center>

![](https://s3.hedgedoc.org/demo/uploads/5637932a-ced5-442a-b138-99a12f394de7.png)

![](https://s3.hedgedoc.org/demo/uploads/5dd0630c-9231-49b8-962b-aa7789f2b99e.png)

</center>

Despite the lack of authorization checks, the server accepted the request and updated the information for the user with `id=1`, even though you don't have the necessary permissions to do so.

This is a clear example of a **BOLA** vulnerability, where the server fails to properly validate the user's authorization to perform the requested action on a specific resource (in this case, the user with `id=1`).

---

### 2. Broken Authentication

The second vulnerability we'll explore is **Broken Authentication**, which allows an attacker to *bypass authentication mechanisms* and impersonate legitimate users.This can happen due to *weak passwords*, *default credentials*, *brute-force attacks*, or unauthorized access to tokens or credentials.

<center>

![](https://s3.hedgedoc.org/demo/uploads/5ef042fc-4517-4853-9b6e-60cd5687a08c.png)

</center>

In ==`API2`==, there are two endpoints:

* ==`User Login`== **Endpoint**: Allows users to log in using their ==`email`== and ==`password`==, returning a *token*.
* ==`Get Details`== **Endpoint**: Uses the token from the ==`login`== endpoint to retrieve specific user information.

<center>

![](https://s3.hedgedoc.org/demo/uploads/545e59dc-0a9c-4d6b-a817-c5f65ebcb57b.png)

</center>

An attacker can exploit weak authentication mechanisms to gain unauthorized access to a user's account. This can be done by:

* Using weak or default passwords.
* Performing brute-force or dictionary attacks to guess passwords.
* Gaining unauthorized access to tokens or credentials.

**Endpoints**
1. ==`User Login`== Endpoint
    * **HTTP Method**: ==`POST`==
    * **Endpoint**: ==`/vapi/api2/user/login`==
    * **Request Body**:

```json=
{
    "email":"savanna48@ortiz.com",
    "password":"zTyBwV/9"
}
```

<center>

![](https://s3.hedgedoc.org/demo/uploads/70fa9627-609f-49fd-a083-65cd6fb0d4ba.png)

</center>

2. ==`Get Details`== Endpoint
    * **HTTP Method**: ==`GET`==
    * **Endpoint**: /vapi/api2/user/details
    * **Headers**:
        * **Authorization-Token**: ==`Fp0r1mty_gxK9DRZ5IUw3sX2enQ6rau68M6YGyoqR3XoBG13wtSbvmdaK5CB`==

<center>

![](https://s3.hedgedoc.org/demo/uploads/fb0b0b19-a82b-4696-946b-1dc95326fa58.png)

</center>

In this scenario, there's a file called ==`creds.csv`== in the resource folder containing numerous ==`IDs`== and passwords. We can use **Burp Suite** to automate the login attempts and find valid credentials.

<center>

![](https://s3.hedgedoc.org/demo/uploads/80a6bf7b-7502-4b8c-8d3c-6f6845d81002.png)

</center>

To exploit the **broken authentication vulnerability** in **API 2** using **Burp Suite**, we'll capture the login request and send it to the **Intruder**. We'll configure the attack to use credentials from the `creds.csv` file.

**Step-by-Step Guide**

1. **Open Burp Suite**:
   - Launch **Burp Suite** and ensure your browser is configured to route traffic through Burp's proxy.

<center>

![](https://s3.hedgedoc.org/demo/uploads/93566c79-2995-4876-8d14-81bbc4a4004f.png)

</center>

2. **Capture the Login Request**:
   - In your browser, navigate to the login endpoint of the vAPI application.
   - Enter a test email and password, then attempt to log in.
   - Burp Suite will capture the request.

<center>

![](https://s3.hedgedoc.org/demo/uploads/fcdccfaa-5c7d-4405-a367-87e08ebf77fc.png)


![](https://s3.hedgedoc.org/demo/uploads/28f6af99-ef33-4146-912b-2cf85ccbe822.png)

</center>

3. **Send Request to Intruder**:
   - In Burp Suite, go to the "Proxy" tab and find the captured login request in the "HTTP history" sub-tab.
   - Right-click on the login request and select "Send to Intruder".

<center>


![](https://s3.hedgedoc.org/demo/uploads/7568ce31-465c-4b62-bda0-198feb1639ab.png)


</center>

4. **Configure Intruder**:
   - Go to the "Intruder" tab and select the "Positions" sub-tab.
   - Highlight the email and password fields in the request body and click "Add §" to mark them as positions to be attacked.

<center>

![](https://s3.hedgedoc.org/demo/uploads/ab98e308-53c4-4d96-9a70-3117813c51c0.png)

</center>

5. **Set Attack Type**:
   - Set the attack type to "Pitchfork". This allows Burp Suite to pair each email with a corresponding password from the payloads.

<center>

![](https://s3.hedgedoc.org/demo/uploads/27b61b54-60af-4b44-a132-84e843678bb0.png)

</center>

6. **Load Payloads**:
   - Go to the "Payloads" sub-tab.
   - For **Payload set 1** (email), click "Load" and select the `creds.csv` file. This will load the list of emails.
   - For **Payload set 2** (password), click "Load" and select the `creds.csv` file again. This will load the list of passwords.

<center>

![](https://s3.hedgedoc.org/demo/uploads/34e1955a-2bd1-4fed-8047-805536665a34.png)

![](https://s3.hedgedoc.org/demo/uploads/de39fc2f-bb3b-435a-a847-01a94e0a8bf7.png)

</center>

7. **Start the Attack**:
   - Click "Start attack" to begin the brute-force attack.
   - Burp Suite will try each combination of email and password.

<center>

![](https://s3.hedgedoc.org/demo/uploads/a691b0ab-2a6a-4a33-99d8-e8f9adf10b65.png)

</center>

8. **Analyze Results**:
   - Once the attack is complete, look for successful login attempts in the "Intruder results" window.
   - Successful logins will typically have a different response status or length compared to failed attempts.

<center>

![](https://s3.hedgedoc.org/demo/uploads/c581ef8b-f452-443c-bd18-7c7c7de10312.png)

![](https://s3.hedgedoc.org/demo/uploads/e217b9cd-33c6-47d9-ba9e-683aaf94f7ff.png)

![](https://s3.hedgedoc.org/demo/uploads/b3668c58-1e8f-482b-930d-2b0760050281.png)

</center>

By following these steps, you can exploit *broken authentication vulnerabilities* using Burp Suite. This allows you to identify weak or **default credentials** and gain **unauthorized access** to user accounts. 

---

### 3. Excessive data exposure

<center>

![](https://s3.hedgedoc.org/demo/uploads/676ea6d2-39dd-4dc9-bbd9-3801882aa368.png)

</center>


We often share more data than necessary. This **API response** includes unnecessary information, which users may exploit.

To investigate, we use an **APK** from the resources folder in our emulator. Next, we exploit the API using a tool like **Burp Suite**. We set up a proxy, intercept the request, and send it to the repeater for testing.

<center>

![](https://s3.hedgedoc.org/demo/uploads/202d1873-49f5-4867-9d29-b6c40d67269d.png)

</center>

The response reveals *excessive data exposure*, providing an easy flag. Despite the **API** returning extensive data upon login, not all is displayed. A tool like **Burp Suite** reveals this needless data exposure.

<center>

![](https://s3.hedgedoc.org/demo/uploads/c0659e0e-e9de-49f3-aec2-48dc1d8c03b3.png)


![](https://s3.hedgedoc.org/demo/uploads/edbd9c26-6750-4186-ba06-b36c0ad08e9f.png)

</center>

---

### 4. Lack of resources and rate-limiting


<center>

![](https://s3.hedgedoc.org/demo/uploads/c5892bc7-2d72-44fd-938d-8e2bf29f0ab7.png)

</center>

**APIs** often lack proper protection against excessive *client-side requests*, making them vulnerable to **denial-of-service (DoS)** attacks or allowing attackers to bypass authentication systems by flooding the server with requests. This vulnerability demonstrates how to exploit **APIs** that do not implement rate limiting.

In this scenario, we have three endpoints:

* **Send OTP** (Mobile Login)
* **Verify OTP** 
* **View User Details** (Get Details)

**Exploiting Lack of Resources and Rate Limiting**
* **Send OTP**:
    * We start by sending an OTP to the user's phone number or email.
        <center>

        ![](https://s3.hedgedoc.org/demo/uploads/5454aeb5-5463-404c-b0b5-9362a99c8a40.png)

        ![](https://s3.hedgedoc.org/demo/uploads/f3febf4e-7745-4d5c-a982-2e936c9c4a14.png)

        </center>

At this stage, we have encountered an obstacle: the **OTP (One-Time Password)** is unknown to us. However, we can gather from the response body of the previous request that the **OTP** is likely composed of four digits. Moreover, there seems to be no rate limiting, which suggests that we have an opportunity to attempt a brute force approach to ascertain the **OTP**.

To implement this, we'll first need to capture the request. This can be done by manually entering any random 4 digits. We'll use **Burp Suite** for this, a popular tool in the field of web security. Once we have captured the request with our inputted 4-digit code, we will then forward it to the intruder tab of Burp Suite. This process will enable us to automate the brute force attack, by cycling through all possible 4-digit combinations until the correct **OTP** is found.

<center>

![](https://s3.hedgedoc.org/demo/uploads/f0e5d01f-ca2a-4314-86c3-7db2d5b1866e.png)

</center>

The first step in the process is to select the **OTP (One-Time Passcode)** value, which will be used as the payload, and set the attack type to ==`sniper`==. This is critical because the **OTP** forms the basis of our payload and the sniper attack type is efficient for this operation.

<center>

![](https://s3.hedgedoc.org/demo/uploads/98b62201-fd89-4dd8-9f45-810a397eef82.png)

</center>

After completing the first step, navigate to the ==`payload`== tab in the interface. Here, you will need to configure the payload type and various payload options. Specifically, set the payload type to ==`numbers`==. This is because the OTP value we are using is numeric.

<center>

![](https://s3.hedgedoc.org/demo/uploads/715e6ade-cbec-4d1e-b4d1-426ee22ef6b4.png)

</center>

In the payload options, adjust the settings as depicted in the screenshot provided above. It's important to follow these settings carefully, as they determine how the payload will be generated and used in the attack. By following these steps, you can ensure that the process is carried out effectively.

**We can see the correct OTP **
<center>

![](https://s3.hedgedoc.org/demo/uploads/3b9dfcce-e050-4ae7-b582-151c3c6a6050.png)

![](https://s3.hedgedoc.org/demo/uploads/52bdbdf0-7375-4dc9-941a-9af386636457.png)

</center>


Yes we got the key I think it’s time for our **FLAG**

<center>

![](https://s3.hedgedoc.org/demo/uploads/2cb0babd-99a4-4705-8c09-638d6dea733b.png)

    
![](https://s3.hedgedoc.org/demo/uploads/16a3918b-1963-4c48-9c55-46b355b0fd6c.png)

</center>


---

### 5. Broken function-level authorization

**Broken function-level authorization** occurs when an **API** improperly enforces what functions users can access. This can lead to *unauthorized* users performing actions they shouldn't be able to or accessing data they shouldn't have.

<center>

![](https://s3.hedgedoc.org/demo/uploads/a947cd51-1a21-4605-8bcb-a08fe46d17fc.png)

</center>


In this example, we'll demonstrate how a normal user can manipulate the request method to retrieve information or perform actions that should be restricted.

**Steps to Exploit**
* **Create a User**:
    * Send a POST request to create a new user and obtain an auth token.
    * You should receive a response with an authentication token.

<center>

![](https://s3.hedgedoc.org/demo/uploads/3e80df94-2604-4c58-b497-d80c7d9f758a.png)

![](https://s3.hedgedoc.org/demo/uploads/1cf56210-83ba-4405-8513-489f79c5f518.png)

</center>

**Captured Request**:
```http=
POST /vapi/api5/create_user HTTP/1.1
Host: 158.160.154.200
Accept-Encoding: gzip, deflate, br
Accept: */*
Content-Type: application/json
Content-Length: 75

{
    "username":"testuser2",
    "password":"test123",
    "name":"Test User",
    "address":"ABC",
    "mobileno":"888888888"
}

```

Okay, let's calculate the Basic Authentication token for the provided user credentials:

```json
{
    "username": "testuser2",
    "password": "test123",
    "name": "Test User",
    "address": "ABC",
    "mobileno": "888888888"
}
```

The steps to calculate the Basic Authentication token are:

1. **Concatenate the username and password with a colon (`:`) separator**:
   ```
   testuser2:test123
   ```

2. **Encode the concatenated string using Base64 encoding**:
   ```
   dGVzdHVzZXIyOnRlc3QxMjM=
   ```

The resulting Basic Authentication token is:
```
dGVzdHVzZXIyOnRlc3QxMjM=
```

* **Access Restricted Data**:
    * Attempt to access restricted data or perform restricted actions using the auth token.
    * Include the authentication token obtained in the previous step in the Authorization header.
    
**Captured Request**:

```http=
GET /vapi/api5/users HTTP/1.1
Host: 158.160.154.200
Accept-Encoding: gzip, deflate, br
Accept: */*
Content-Type: application/json
Content-Length: 75
Authorization-Token:dGVzdHVzZXIyOnRlc3QxMjM=
```

<center>

![](https://s3.hedgedoc.org/demo/uploads/1d1cf1d7-0cad-43f7-81d4-6505375fef71.png)

</center>

Now we will intercept this request and try to see the details of all users as I think there should be our flag.

<center>

![](https://s3.hedgedoc.org/demo/uploads/9d4c522e-938d-44df-b02e-02cc6699579d.png)

</center>

This demonstrates that the server-side code is not properly validating the user's permissions and authorizing the requested action. The server is allowing the user to perform an action (retrieving the user list) that they should not have access to.

---


### 6. Mass assignment

**Mass assignment** vulnerability occurs when an **API** accepts user input without properly filtering or validating it, allowing attackers to add *unexpected* or *unauthorized* data to the request. This can lead to *unauthorized access* or modification of sensitive features.

<center>

![](https://s3.hedgedoc.org/demo/uploads/e31be5f3-3000-472f-872d-f90dbddaf7a4.png)

</center>

*Let's explore how to exploit this vulnerability in the **vAPI** project.*

**Exploitation Steps**

* **Create a new user using the API 6 endpoint:**
    * Send a **POST** request to the ==**`vapi/api6/user`**== endpoint to create a new user.
    * Include the standard user data in the request body, such as ==`username`==, ==`password`== and ==`name`==.

<center>

![](https://s3.hedgedoc.org/demo/uploads/71ec5a23-6425-4c36-8aa5-6d9083b95a22.png)

![](https://s3.hedgedoc.org/demo/uploads/a3199bb6-0941-40c5-a0ea-4374b18abd69.png)

</center>

Good, you've successfully created a new user using the **API 6** endpoint and obtained an *authentication token* in the response. This token can now be used to access the user details in the next endpoint.

<center>

![](https://s3.hedgedoc.org/demo/uploads/d6314341-82f3-472b-b0e1-9abb7aa577d2.png)

</center>


* **Retrieve the user details using the authentication token**:

    * Send a **GET** request to the ==`vapi/api6/user/me`== endpoint.
    * Include the *authentication token* obtained from the previous step in the **Authorization** header of the request.
    * The server should return the user details in the response.

<center>

![](https://s3.hedgedoc.org/demo/uploads/b6128a89-3ed2-4ce7-bf97-12c1f3b83450.png)


![](https://s3.hedgedoc.org/demo/uploads/87c5184c-d320-4e15-8574-a5010ae809c0.png)

</center>

Here we notice an intriguing parameter: **==`credit`==**.

Let's incorporate this parameter into our first endpoint and see if we can increase our credit. 😈

<center>

![](https://s3.hedgedoc.org/demo/uploads/2204c8f6-4fc4-4451-bd5d-cdc826af1743.png)

![](https://s3.hedgedoc.org/demo/uploads/97953ac3-2fd6-4063-9a9c-780577a50654.png)

![](https://s3.hedgedoc.org/demo/uploads/e143f47f-ee04-474e-8853-fb3687c0cd73.png)


</center>

This demonstrates how the **Mass Assignment** vulnerability can be exploited to gain unauthorized access to sensitive data or functionality within the **API**. By manipulating the request to include unexpected fields, an attacker can potentially bypass intended access controls and gain elevated privileges or access to restricted resources.

---

### 7. Security misconfiguration

**Security misconfiguration** can occur due to default or incomplete configurations, misconfigured *HTTP headers*, *improper Cross-Origin Resource Sharing (CORS) settings*, and verbose error messages containing sensitive data. These flaws can be exploited by attackers to gain *unauthorized access* or bypass security measures.

<center>

![](https://s3.hedgedoc.org/demo/uploads/9ef4abcb-3273-4c0f-b345-b494a35aeae0.png)

</center>


In this scenario, we will explore security misconfigurations by interacting with various endpoints and examining their configurations.

**Endpoints**
* **Create User**: Obtain an *authentication token*.
* **User Login**: Use the *auth token* to log in.
* **Get Key**: Retrieve a key.
* **User Logout**: Log out the user.

<center>

![](https://s3.hedgedoc.org/demo/uploads/6353c7cc-1c2d-43d1-be7e-24eb245b704e.png)

![](https://s3.hedgedoc.org/demo/uploads/91c3aea0-522e-484a-9f21-520cbe32bc5d.png)

</center>

Next, we enter the *authentication token* and log in. In this weak encryption, the ==`auth_token`== is regular **base64** encoded.

<center>

![](https://s3.hedgedoc.org/demo/uploads/a8a1bca5-b9fd-4a75-8958-6f45e89d89b0.png)

![](https://s3.hedgedoc.org/demo/uploads/1c003d38-aade-4ac5-b7f3-559fa1375e63.png)

</center>


Once we've successfully logged in, we proceed to the next endpoint, where we secure the key. This process is crucial in our task, as suggested by the lab description, where we are required to exploit a **Cross-origin Request**.

The term ==`origin`== refers to a specific header that is included in the request. Its primary function is to establish a ==`security context`== for the origin request. This is applicable in all scenarios except for the ones in which the original information might be sensitive or unnecessary, where it would not be prudent to use it.

To execute this, we introduce a header in this request. We choose to assign it the value [https://bing.com](https://bing.com/). This value is not randomly selected but is chosen for specific reasons that will help us achieve our goal more effectively. It is this careful and strategic planning that will enable us to complete the task at hand successfully.

<center>

![](https://s3.hedgedoc.org/demo/uploads/bb99de9b-3f24-4b4f-90ea-e587cefd68ea.png)

![](https://s3.hedgedoc.org/demo/uploads/d98d6835-e6d5-4809-bfb6-c9b82140d15e.png)

</center>


---

### 8. Injection

<center>

![](https://s3.hedgedoc.org/demo/uploads/a9a82d60-e075-4fc3-96e8-88571aef9bfe.png)

</center>

**Injection** vulnerabilities are prevalent and highly impactful, consistently appearing in the **OWASP Top 10 list**. These vulnerabilities occur when untrusted input is sent to an interpreter as part of a command or query. The interpreter executes this input without *proper validation* or *sanitization*, leading to unintended and potentially harmful execution of commands or queries.

In this scenario, we will explore **injection** vulnerabilities by interacting with endpoints and attempting to inject malicious inputs.

**Endpoints**

1. ==`User Login`==
2. ==`Get Secret`==

Attempt to log in using random credentials to understand the login mechanism.

<center>

![](https://s3.hedgedoc.org/demo/uploads/5db2541c-a6fe-42cf-8f36-bc90fef7ba4f.png)

</center>

Since we cannot log in using random credentials, we will attempt **SQL** injection to bypass *authentication*.

As the lab name indicates, I attempted **SQL** injection and received a **MYSQL** error.

<center>

![](https://s3.hedgedoc.org/demo/uploads/94dfe0c3-b9d0-41c2-9610-a977f26d746d.png)

</center>

After exploiting this error, I obtained the auth token.

The payload I used was **'or'1'='1**. Feel free to try others as well.

<center>

![](https://s3.hedgedoc.org/demo/uploads/f09a658e-cb08-4317-842f-32838abe6790.png)

</center>

After successfully obtaining the **authentication token**, we were able to make use of it in our subsequent interactions with the system. We utilized this auth token as a means of verification when sending requests from the second endpoint. This was a critical step in our process, and it was indeed successful. The result was exactly what we were hoping for - we managed to retrieve the **FLAG**!!!

<center>

![](https://s3.hedgedoc.org/demo/uploads/f996199a-5979-4411-ab23-42613c06d02f.png)

</center>

This demonstrates how Injection vulnerabilities, such as **SQL** injection, can be exploited to bypass authentication and authorization controls, leading to the disclosure of sensitive data or even the execution of arbitrary commands on the server.

---


### 9. Improper assets management

**Improper assets management** refers to the failure to properly inventory, manage, and retire API versions and endpoints. When older versions of APIs are not properly deprecated or secured, they can expose vulnerabilities that have been fixed in newer versions.



<center>

![](https://s3.hedgedoc.org/demo/uploads/821af3a8-c486-4df7-bc47-ae4923707eee.png)

</center>

In this scenario, we will explore how an attacker can exploit improper asset management by accessing an outdated version of an **API**.

When we send a request, we receive a response that indicates ==`rate-limiting`== is enabled. This brings up the question of what steps we can take to successfully log in and obtain the flag.

<center>

![](https://s3.hedgedoc.org/demo/uploads/34b03dcd-0cb1-4fdf-bc87-9293b572785f.png)

</center>

The term ==`rate-limiting`== is typically associated with *security measures*. In this context, it refers to the control of the frequency at which a particular action can be performed.


Let’s put this theory to the test and change ==`v2`== to ==`v1`==, then send our request. Interestingly, we find that we are able to send the request without encountering the rate-limiting issue.

<center>

![](https://s3.hedgedoc.org/demo/uploads/d7bc3bd8-88f4-4698-a2fb-4dc429b0f5b1.png)

</center>


With this newfound knowledge, we could potentially launch an attack. This could be done by setting the value as payload position and adjusting the payload option as a number, incrementing from 1000 to 1700, one step at a time.

<center>

![](https://s3.hedgedoc.org/demo/uploads/0450c4eb-cc44-42a3-90ee-3733aa9f2f97.png)


![](https://s3.hedgedoc.org/demo/uploads/3f84a1d6-22ce-46d5-ac58-12c2b0f9757d.png)

</center>

Through this methodical approach, we achieved success on the **1655th** attempt and successfully obtained the **FLAG**!!!

<center>


![](https://s3.hedgedoc.org/demo/uploads/513f55ce-22e7-44fe-a6ca-a16c78d422b2.png)

![](https://s3.hedgedoc.org/demo/uploads/e32aacfa-ecd5-4610-b244-728347d1a208.png)

</center>

---


### 10. Insufficient logging and monitoring

Insufficient logging and monitoring refer to the lack of proper mechanisms to detect, log, and monitor unauthorized access and other security events. This weakness allows attackers to remain undetected, enabling them to persist within the system, perform lateral movements, and potentially compromise critical systems.

<center>

![](https://s3.hedgedoc.org/demo/uploads/fdc7e96c-cd32-49db-809b-a6749e631347.png)

</center>

**Explanation**

**Importance of Logging and Monitoring:**
- **Detection of Attacks:** Proper logging and monitoring help in the early detection of security breaches and malicious activities.
- **Incident Response:** Enables quick response to security incidents, minimizing the impact.
- **Audit Trail:** Provides a trail of activities that can be analyzed post-incident to understand the breach and improve security measures.
- **Compliance:** Helps in meeting regulatory compliance requirements for security and data protection.

**Common Issues:**
- **Incomplete Logs:** Not capturing sufficient detail in logs (e.g., missing user activities, failed login attempts).
- **Inaccessible Logs:** Logs that are not easily accessible or analyzed.
- **Lack of Alerts:** No system in place to alert administrators of suspicious activities.
- **Log Overwrite:** Logs that are overwritten too frequently, losing critical information.

<center>

![](https://s3.hedgedoc.org/demo/uploads/0b241769-afdb-4987-bd06-b13d7e2bd2bd.png)

</center>

**Scenario Description**

In this scenario, we highlight the significance of logging and monitoring in preventing attackers from remaining undetected within a system. Since this is a design flaw, it doesn't require a specific walkthrough to exploit. Instead, the focus is on how proper logging and monitoring could prevent potential security breaches.

**Example:**

Suppose an attacker gains access to the system and performs unauthorized activities. Without sufficient logging and monitoring:
- **Detection Failure:** The attacker remains undetected, continuing malicious activities.
- **No Alerts:** No alerts are generated to notify administrators of suspicious activities.
- **No Audit Trail:** Lack of detailed logs makes it difficult to trace the attacker’s activities and understand the breach's scope.

**Implementation of Logging and Monitoring:**

1. **Detailed Logging:**
   - Capture detailed logs for all critical activities (e.g., logins, data access, changes to settings).
   - Include user details, timestamps, IP addresses, and action details.

2. **Centralized Log Management:**
   - Use centralized log management systems to aggregate and analyze logs from different sources.

3. **Real-Time Monitoring:**
   - Implement real-time monitoring tools to detect and alert on suspicious activities immediately.

4. **Retention Policies:**
   - Establish log retention policies to ensure logs are kept for an adequate period for forensic analysis.

5. **Regular Audits:**
   - Conduct regular audits of logs to identify patterns or anomalies that might indicate security issues.

---


## Conclusion

In this comprehensive guide, we have explored ten critical **API** vulnerabilities as outlined by **OWASP**, demonstrating how these vulnerabilities can be exploited using the **vAPI** framework. Each vulnerability represents a significant risk to **API** security and highlights common pitfalls that developers and organizations must address to secure their APIs effectively.

**Key Takeaways**

- **Security Awareness:** Understanding these vulnerabilities is crucial for developers and security teams to mitigate risks effectively.
- **Best Practices:** Implementing robust authentication, authorization, input validation, and logging mechanisms is essential.
- **Continuous Improvement:** Regular security assessments, updates, and monitoring are vital to maintain API security.

By addressing these vulnerabilities proactively and adhering to best practices, organizations can significantly enhance the security posture of their **APIs**, safeguarding sensitive data and maintaining trust with users and stakeholders. Remember, securing **APIs** is an ongoing process that requires diligence, awareness, and adaptation to evolving threats and best practices in cybersecurity.

