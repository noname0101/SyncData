SyncData - Compares files contained in dropbox and sendspace accounts, and uploads missing files to sendspace account.

Application - User is authenticated and provided with access token using which we can see contents of dropbox account. 
The contents are downloaded to the WebFiles/DropBox. The user logs in to sendspace account and downloads files to WebFiles/SendSpace directory.

The search.php checks these two directories and identifies the files missing in WebFiles/SendSpace.


