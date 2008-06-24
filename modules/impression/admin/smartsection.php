<?php

    $error = array();
    $output = array();

$i=0;
$i++;
     $ret[$i] = true;
     $query[$i] = sprintf("DROP TABLE " . $xoopsDB -> prefix('impression_articles'));
     $ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
$i++;
     $ret[$i] = true;
     $query[$i] = sprintf("DROP TABLE " . $xoopsDB -> prefix('impression_cat'));
     $ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

    $table_array = array( "smartsection_categories" => impression_cat,
                          "smartsection_items" => impression_articles); 

    foreach ($table_array as $table1 => $table2)
    {
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix(trim($table1)) . " RENAME TO " . $xoopsDB -> prefix(trim($table2)) . " ");
        if (!$result)
        {
            $error[]="<b>Error:</b> Could <span style='color:#ff0000;font-weight:bold'>not rename</span> table $table1 to table <b>$table2</b>!";
        } 
        else
        {
            $output[]="<b>Success:</b> Table <b>$table1</b> was <span style='color:#FF0000;font-weight:bold'>renamed</span> to $table2 Successfully";
        } 
        unset($result);
    }


    /**
     * Update category
     */	 
	//Change some Fields

	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " CHANGE INDEX categoryid cid int(11) unsigned NOT NULL auto_increment");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " CHANGE parentid pid int(11) unsigned NOT NULL default '0'");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " CHANGE image imgurl varchar(255) NOT NULL default 'folder.png'");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " CHANGE name title varchar(100) NOT NULL default ''");

	//Add some Fields
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " ADD meta_keywords text NOT null default ''");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " ADD meta_description text NOT null default ''");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " ADD short_url varchar(255) NOT null default '1'");

	//Delete some Fields
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " DROP COLUMN created");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " DROP COLUMN template");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_cat') . " DROP COLUMN header");

    /**
     * Update articles
     */	 
	//Change some Fields

	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE INDEX itemid aid int(11) unsigned NOT NULL auto_increment");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE categoryid cid int(11) unsigned NOT NULL default '0'");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE summary introtext longtext NOT NULL default ''");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE body description longtext NOT NULL default ''");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE uid submitter int(11) NOT NULL default '0'");
	$result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE datesub published int(11) NOT NULL default '0'");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE counter hits int(11) unsigned NOT NULL default '0'");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE image screenshot varchar(255) NOT NULL default ''");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " CHANGE status status tinyint(2) NOT NULL default '0'");
        
//        $time = time();

        //Add some fields
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD publisher varchar(255) NOT null default '' AFTER submitter");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD date int(11) NOT NULL default '0' AFTER publisher");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD expired int(10) NOT NULL default '0' AFTER published");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD updated int(11) NOT NULL default '0' AFTER expired");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD offline tinyint(1) NOT NULL default '0' AFTER updated");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD ipaddress varchar(120) NOT NULL default '0'");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD rating double(6,4) NOT NULL default '0.0000' AFTER hits");
        $result = $xoopsDB -> query("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " ADD votes int(11) unsigned NOT NULL default '0' AFTER rating");

        //Delete some Fields
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " DROP COLUMN display_summary");
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " DROP COLUMN dohtml");
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " DROP COLUMN dosmiley");
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " DROP COLUMN doxcode");
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " DROP COLUMN doimage");
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix('impression_articles') . " DROP COLUMN partial_view");





   echo "<b>Finished updating Module</b>\n";
//include XOOPS_ROOT_PATH . '/footer.php';
?>