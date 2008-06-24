==================
XOOPSTUBE 1.0.1 RC
==================


1. INSTALLING XOOPSTUBE

Unzip/unrar the downloaded file.
Upload the folder 'xoopstube' to the folder 'modules' on your server.
Upload the folder 'xt_images' to the folder 'uploads' on your server and check that the folder including sub-folders are CHMOD 777.
Go to the admin panel, choose Modules -> Administration and install XoopsTube as any other Xoops module.


2. UPGRADING FROM XOOPSTUBE 1.00RC

XoopsTube 1.00RC has less options in the Preferences. 
A couple of files and 2 tables from the database have been removed.

Before you start upgrading you should make a backup of your database and the folders /uploads/xt_images and /modules/xoopstube.

Remove the folder /modules/xoopstube and its contents from your server. Now place the new version of XoopsTube in the modules folder.
Log in to your website as administrator, go to the admin control panel and update XoopsTube.
Remove all files from the folder templates_c on your server except the file index.html.
Check if XoopsTube is still running fine by visiting your frontpage.

Two tables of the database are not in use anymore by XoopsTube.
These tables are wf_resources and wf_resource_types.
If you don't use any module like WF-Links, WF-Sections or WF-Channel these two tables can be removed manually from your database.

These folder /uploads/xt_images/screenshots can be removed too. Make a backup first.


3. SOCIAL BOOKMARKS

Social bookmarks will be visible under the video clip.
In the file sbookmarks.php you can select which social bookmarks should be visible.
Just comment out the once you don't want to be visible.
Note that not all social bookmarks have been tested.
It's known that the social bookmark Windows Live doesn't work correctly.


4. WHAT CHANGED

XoopsTube 1.0.1 rc has a couple of major changes.

Uploading thumbnails of the videoclips isn't necessary anymore. Thumbnails are taken directly from YouTube.
The dimensions of the thumbnails can be set in Preferences. The default setting is width=120px and height=90px.
If the thumbnails does not appear check if the embedded code entered in submit form is correct.
When a thumbnail is suddenly missing the videoclip has been removed from YouTube.

There are 7 blocks you can choose from. 2 of the block have (t) behind their names. This means that their content is textual.
The other blocks show thumbnails of the videclips.
The blocks with (h) are meant horizontal blocks and meant for the center column of the website.

For the changelog click 'About' in 'Main Index' or open the file bugfixlist.txt in a texteditor.


5. WAITING & SITEMAP PLUGINS

There are also plugins for GIJOE's Waiting and Sitemap module.
You can download these modules and find more info about them, here: http://xoops.peak.ne.jp


6. BUG REPORTS

You can send me a pm on xoops.org if you find a bug, have problems or any other question related to XoopsTube.



    .::McDonald::.

    http://members.lycos.nl/mcdonaldsstore/
    
