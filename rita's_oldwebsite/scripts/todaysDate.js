// JavaScript Document

function todaysDate() {
	
	// create variable container
	var todaysDate = new Date();
                    
	// create elements that make up date to be stored in container
	var month = todaysDate.getMonth();
	var date = todaysDate.getDate();
	var year = todaysDate.getFullYear();
                    
	// the month 'names' in values 
	var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                    
	// Today's date displayed as: Month Day, Year.
	document.write("<div id='currentDate'> Today is " + monthArray[month] + " " + date + ", " + year + ". </div>");
					
}