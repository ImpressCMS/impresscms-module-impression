<?php

include_once XOOPS_ROOT_PATH."/class/xoopsobject.php";

class XoopsTube extends XoopsObject
{

      function XoopsTube($id = null)
      {
        $this -> db =& Database::getInstance();
        $this -> initVar("lid", 			XOBJ_DTYPE_INT, null, false);
        $this -> initVar("cid",                         XOBJ_DTYPE_INT, 0, true);
        $this -> initVar("title",                       XOBJ_DTYPE_TXTBOX, "");
        $this -> initVar("url",                         XOBJ_DTYPE_TXTBOX, "");
        $this -> initVar("screenshot",                  XOBJ_DTYPE_TXTBOX, "");
        $this -> initVar("submitter",                   XOBJ_DTYPE_INT, 0);
        $this -> initVar("publisher",                   XOBJ_DTYPE_TXTBOX, "");
        $this -> initVar("status",                      XOBJ_DTYPE_INT, "");
        $this -> initVar("date",                        XOBJ_DTYPE_INT, 0);
        $this -> initVar("hits",                        XOBJ_DTYPE_INT, 0);
        $this -> initVar("rating",                      XOBJ_DTYPE_OTHER, 0.0);
        $this -> initVar("votes",                       XOBJ_DTYPE_INT, 0);
        $this -> initVar("comments",                    XOBJ_DTYPE_INT, 0);
        $this -> initVar("vidsource",                   XOBJ_DTYPE_INT, 0);
        $this -> initVar("published",                   XOBJ_DTYPE_INT, 0);
        $this -> initVar("expired",                     XOBJ_DTYPE_INT, 0);
        $this -> initVar("updated",                     XOBJ_DTYPE_INT, 0);
        $this -> initVar("offline",                     XOBJ_DTYPE_INT, 0);
        $this -> initVar("description",                 XOBJ_DTYPE_TXTAREA, '');
        $this -> initVar("ipaddress",                   XOBJ_DTYPE_INT, 0);
        $this -> initVar("notifypub",                   XOBJ_DTYPE_INT, 0);
        $this -> initVar("urlrating",                   XOBJ_DTYPE_INT, 0);
        $this -> initVar("time",                        XOBJ_DTYPE_INT, 0);
        $this -> initVar("keywords",                    XOBJ_DTYPE_TXTBOX, "");
        $this -> initVar("item_tag",                    XOBJ_DTYPE_TXTBOX, "");

        if (isset($id)) {
			$xoopstube_video_handler =& xoops_getmodulehandler('xoopstube');
			$item =& $xoopstube_video_handler->get($id);
			foreach ($item->vars as $k => $v) {
				$this->assignVar($k, $v['value']);
			}
			$this->assignOtherProperties();
		        } else {};
      }
}



?>