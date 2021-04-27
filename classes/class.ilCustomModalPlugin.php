<?php
include_once("./Services/Calendar/classes/class.ilAppointmentCustomModalPlugin.php");

/***
 *
 * Plugin example for the calendar revision.
 * Plugin slot: AppointmentCustomModal
 * https://www.ilias.de/docu/goto.php?target=wiki_1357_Plugin_Slot_for_Detailed_Appointement_View
 * @author Jesús López Reyes <lopez@leifos.com>
 * @version $Id$
 *
 */
class ilCustomModalPlugin extends ilAppointmentCustomModalPlugin
{
	/**
	 * Get Plugin Name. Must be same as in class name il<Name>Plugin
	 * and must correspond to plugins subdirectory name.
	 *
	 * @return	string	Plugin Name
	 */
	final function getPluginName()
	{
		return "CustomModal";
	}

	/**
	 * replace the complete modal content or empty
	 * @return string
	 */
	public function replaceContent()
	{
		//replace content only for courses, so everything else gets extra content added
        $appointment = $this->getAppointment();
        $cat_id = ilCalendarCategoryAssignments::_lookupCategory($appointment->getEntryId());
        $cat = ilCalendarCategory::getInstanceByCategoryId($cat_id);

        if (ilObject::_lookupType($cat->getObjId()) != 'crs') {
            return "";
        }

		$appointment = $this->getAppointment();

		if($appointment->isFullDay())
		{
			return "<div style='background-color: lightblue; border:3px solid red;padding:10px;'>
 					<p>Das Plugin 'TestCalendarCustomModalPlugin' ersetzt den Inhalt von ganztägigen Kursen</p>
 					<img src='http://lorempixel.com/300/200/technics' alt=''>
 				</div>";
		}
		else
		{
			return "<div style='background-color: lightblue; border:1px solid blue;padding:10px;'>
 					<p>Das Plugin 'TestCalendarCustomModalPlugin' ersetzt den Inhalt von Kursen, die nicht ganztägig sind</p>
 					<img src='http://lorempixel.com/300/200/business' alt=''>
 				</div>";
		}
	}

	/**
	 * Add extra content in the grid.
	 * @return string html content
	 */
	public function addExtraContent()
	{
		$appointment = $this->getAppointment();

		//example dealing with calendar types.
		$cat_id = ilCalendarCategoryAssignments::_lookupCategory($appointment->getEntryId());
		$cat = ilCalendarCategory::getInstanceByCategoryId($cat_id);

		if(ilObject::_lookupType($cat->getObjId()) == "sess") {
			$bgcolor = "orange";
			$str = "Dieses Modal enthält Sitzungsinformationen";
		}  else if($cat->getType() == ilCalendarCategory::TYPE_OBJ) {
			$bgcolor = "#DAF0DF";
			$str = "Dieses Modal enthält Objektinfo";
		} else {
			$bgcolor = "#B5E4EE";
			$str = "Dieses Modal enthält keine Objektinformationen";
		}

		return "<div style='background-color: $bgcolor; border:1px solid orange;padding:10px;'>
 					<h1>$str</h1>
 					<img src='http://lorempixel.com/400/200/technics' alt=''>
 				</div>";
	}

	/**
	 * @param ilInfoScreenGUI $a_info
	 * @return ilInfoScreenGUI
	 */
	public function infoscreenAddContent(ilInfoScreenGUI $a_info)
	{
		$a_info->addProperty("Plugin info", "Dieser Text wird vom Plugin 'TestCalendarCustomModal' erstellt");

		return $a_info;
	}

	/**
	 * @param ilToolbarGUI $a_toolbar
	 * @return ilToolbarGUI
	 */
	public function toolbarAddItems(ilToolbarGUI $a_toolbar)
	{
		$a_toolbar->addText("Text hinzugefügt vom Plugin 'TestCalendarCustomModal'");
		return $a_toolbar;
	}

	/**
	 * @return ilToolbarGUI or empty
	 */
	public function toolbarReplaceContent()
	{
        //replace toolbar only for courses, so everything else gets extra content added
        $appointment = $this->getAppointment();
        $cat_id = ilCalendarCategoryAssignments::_lookupCategory($appointment->getEntryId());
        $cat = ilCalendarCategory::getInstanceByCategoryId($cat_id);

        if (ilObject::_lookupType($cat->getObjId()) != 'crs') {
            return null;
        }

		$toolbar = new ilToolbarGUI();
		$toolbar->addText("Toolbar durch das Plugin 'TestCalendarCustomModal' ersetzt");
		return $toolbar;
	}

	/**
	 * @param string $title
	 * @return string
	 */
	public function editModalTitle($title)
	{
		return "<span style='color:green'>".mb_strtoupper($title)."</span>";
	}
}
