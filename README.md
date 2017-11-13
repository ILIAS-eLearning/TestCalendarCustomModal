# TestCalendarCustomModal

TestCalendarCustomModal is a plugin to test the "AppointmentCustomModal" plugin slot. It is only for test purposes.

**Minimum ILIAS Version:**
5.3.0

**Maximum ILIAS Version:**
5.3.999

**Responsible Developer:**
Jesús López Reyes - lopez@leifos.com

**Supported Languages:**
This plugin does not support any language. All text is hardcoded in the php files. 

### Quick Installation Guide
1. Clone this repository inside the directory <ILIAS_directory>/Customizing/global/plugins/Services/Calendar/AppointmentCustomModal/
   
    _or download the zip file, extract the zip file and then copy the content of the folder inside the directory <ILIAS_directory>/Customizing/global/plugins/Services/Calendar/AppointmentCustomModal/_   
2. Login to ILIAS with an administrator account (e.g. root)
3. Select **Plugins** from the **Administration** main menu drop down.
4. Search the **TestCalendarCustomModal** plugin in the list of plugins and choose Activate from the Actions drop down.


### Expected Result

This plugin add/change content in the default appointment presentation (modals).
Modifications are visible in the Personal Desktop calendar and in the marginal calendar located in courses and groups.

#### Visible Changes

- The title of the modal is displayed in green color with bold capital letters.
	
	- If the appointment is FULL DAY event:

		1. The toolbar is replaced with another one which shows the text: "Toolbar replaced by the plugin 'TestCalendarCustomModal'"
		2. All the content is replaced with a blue box containing:
			- Message: "The plugin 'TestCalendarCustomModalPlugin' replaces the content of full day events."
			- Random image.

	- If the appointment is NOT FULL DAY event:
		1. The toolbar contains an extra text: "Text added by the plugin 'TestCalendarCustomModal'"
		2. The infosceen displays an extra field called "Plugin info" with this value "This text is created by the plugin 'TestCalendarCustomModal'"
		3. Depending of the event this content is added.
			
			- If it is a session event: Orange box with the text "This modal contains Session Information".
			- If it is another kind of ILIAS object: Light green box with the text "This modal contains Object info"
			- If it is not an ILIAS object (e.g. consultation hours): Light blue box with the text "This modal doesn't contain Object info"

			In all the cases a random image is added just below the text.

