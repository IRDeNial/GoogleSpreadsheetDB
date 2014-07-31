GoogleSpreadsheetDB
===================

An example of how to use a Google Drive spreadsheet as a small database.
(This entire project was taken off of [a thread I made in a forum](http://leak.sx/thread-65569) a while back.  I don't know if this still works, but it's still a great peice of information for abnormal thinking.
All of the information will be formatted for this README, all code will be in the repository.

---------------------------------------

## Table of Contents
1. Introduction
2. Database Setup
3. Connect?
4. Authentication Script
5. Conclusion

_______________________________________

## Introduction

Just imagine, a database that has 100% uptime, is not open to SQLi, and is incredibly fast? Sounds too good to be true, but it's not!
 
This was an interesting topic that I looked into a few months ago when trying to create a secure authentication system. I figured, why not host a database on an already secure host, then not allow anyone to modify it unless they are logged into my google account!? Thus, this idea was created and used by myself in several authentication systems for a few months. After a while, I found a faster and more secure method that allows you to do more within the scripts, but this overall works just fine. So I figured, why not share it! Nobody else does this anyways! :D
 
I'm sure you've all used Google Documents by now, so I'm not going to go into a lot of detail about what it is. I'll leave it at, "You can create a spreadsheet".
 
In this tutorial, I'm going to show you how to create a **BASIC** authentication system. I've also divided it into sections and sub-sections so it's easier to navigate between topics.

_______________________________________

## Database Setup
 
First things first, we have to create a spread sheet within our google documents account. You can do this by going to https://drive.google.com, logging in with your google account, then creating a spread sheet. It's VERY simple, so I'm not going to go into detail.
 
Delete every column and row in my spreadsheet, then, for this example, create 3 columns and 6 rows. You're going to want to delete any unused columns/rows to reduce the response size, thus increasing speed.
 
Now, this step is not needed, but I personally did it in the past so I can keep track of what column is what.
Lets create some column headers so we know what we're doing. In this tutorial, I'm going to name them "ID","USER", and "PASS". Put these in the very top row.
 
Just fill in the first actual data column since this is an example. You can add more users if you want, but I'm only going to add one for this example.
 
Last step, we need to make our document public so we can access it from our script.
First, click "File", then select "Share".
I'm sure you can figure out how to change the access level from Private to "Anyone with the link".
 
Next, we need to publish our file to the web.
You can do this by clicking "File", then selection "Publish To Web".
Make sure to select "Sheet1" and check "Automatically respublish when changes are made. Then click "Start Publishing".
 
After you click the "Start Publishing" button, we need the JSON link, but that's not documented anywhere, so we're going to have to get it ourselves.
Under "Get a link to the published data", select "RSS", then "Cells", then copy the link.
For example, my URL is **https://spreadsheets.google.com/feeds/cells/0ArqzqB_MMK5udGJXUWpwdlZyQmpQeU10QnJ2UlJfb3c/od6/public/basic?alt=rss**
To format it to json, we simply change the **alt=rss** to **alt=json**.
And now we have our json feed url!

_______________________________________

## Connect?

Make sure you have the `file_get_contents` function enabled on your host otherwise this will not work.
You could always just use cURL, but, at the time of writing this, I didn't know about cURL...

The script that can be used for connecting/getting data is located in this repository under the name **get_spreadsheet_data.php**

_______________________________________
 
## Authentication Script

Obviously you're going to need to change it to fit your needs, but the authentication script is located in this repository under the name **auth.php**.

_______________________________________

## Conclusion
 
And there you have it! A database hosted on google that's not open to SQLi and has 100% uptime!
Also, I should also mention that it is **NOT** the best way to use this.
There are ways using other libraries that allow you to have full control over the database. This means reading and writing to the database instead of just reading.
 
Hint: Zend (Very horrible library, but that's the only one that I know of that will work).
