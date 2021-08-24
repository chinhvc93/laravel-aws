## Laravel connect with AWS S3

This project use to practice laravel connect with AWS S3 service.

## Install
To install we need:
- project laravel
- aws s3 bucket with IAM permission

## Step 1: On AWS, create user with S3FullAccess in IAM

## Step 2: Login this created account, change password
After create account we have file: new_user_credential.csv
In this file have: username, pass, Access key ID, Secret access key, console login link.

## Step 3: Create S3 bucket with name: {myname}.laravel.s3. 
In this folder, create folder laravel-aws
<br>
Test by try to upload a image, file to laravel-aws folder.

## Step 4: Create or pull project laravel from git
Create new project by command:
```
composer create-project laravel/laravel laravel-aws
```

Or pull this project by command:
```
git clone ...
```

## Step 5: Install packet connect S3
```
composer require --with-all-dependencies league/flysystem-aws-s3-v3 "^1.0" 
```

## Step 6: Setup file .env (if .env not exist, create this file)
From
```
FILESYSTEM_DRIVER=local

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
```
To:
```
FILESYSTEM_DRIVER=s3

AWS_ACCESS_KEY_ID=xxx
AWS_SECRET_ACCESS_KEY=xxx
AWS_DEFAULT_REGION=xxx
AWS_BUCKET={yourname}.laravel.s3
AWS_USE_PATH_STYLE_ENDPOINT=false
```

### Step 7: Create Controller, Route, View
View code in this github