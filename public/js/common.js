var dropdownMenu;
var calendar;
var myInterests;
window.onload = onLoad1;

var docCookies = {
  getItem: function (sKey) {
    if (!sKey) { return null; }
    return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
  },
  setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
    if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
    var sExpires = "";
    if (vEnd) {
      switch (vEnd.constructor) {
        case Number:
          sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
          break;
        case String:
          sExpires = "; expires=" + vEnd;
          break;
        case Date:
          sExpires = "; expires=" + vEnd.toUTCString();
          break;
      }
    }
    document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
    return true;
  },
  removeItem: function (sKey, sPath, sDomain) {
    if (!this.hasItem(sKey)) { return false; }
    document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
    return true;
  },
  hasItem: function (sKey) {
    if (!sKey) { return false; }
    return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
  },
  keys: function () {
    var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
    for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
    return aKeys;
  }
};
function onLoad1(){
	if(window.location.pathname.indexOf("index") != -1){
		var localStorageAmount = localStorage.getItem('indexPage');
		if(localStorageAmount == null){
			localStorage.setItem('indexPage', 1);
		}
		else{
			localStorage['indexPage'] = parseInt(localStorage['indexPage']) + 1;
		}
		if(!docCookies.hasItem('indexPage')){
			docCookies.setItem('indexPage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('indexPage')) + 1;
			docCookies.setItem('indexPage', newValue, Infinity);	
		}
	}
	if(window.location.pathname.indexOf("aboutme") != -1){
		var localStorageAmount = localStorage.getItem('aboutmePage');
		if(localStorageAmount == null){
			localStorage.setItem('aboutmePage', 1);
		}
		else{
			localStorage['aboutmePage'] = parseInt(localStorage['aboutmePage']) + 1;
		}
		if(!docCookies.hasItem('aboutmePage')){
			docCookies.setItem('aboutmePage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('aboutmePage')) + 1;
			docCookies.setItem('aboutmePage', newValue, Infinity);	
		}
	}
	if(window.location.pathname.indexOf("myInterests") != -1){
		var localStorageAmount = localStorage.getItem('myinterestsPage');
		if(localStorageAmount == null){
			localStorage.setItem('myinterestsPage', 1);
		}
		else{
			localStorage['myinterestsPage'] = parseInt(localStorage['myinterestsPage']) + 1;
		}
		if(!docCookies.hasItem('myinterestsPage')){
			docCookies.setItem('myinterestsPage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('myinterestsPage')) + 1;
			docCookies.setItem('myinterestsPage', newValue, Infinity);	
		}
	}
	if(window.location.pathname.indexOf("learning") != -1){
		var localStorageAmount = localStorage.getItem('learningPage');
		if(localStorageAmount == null){
			localStorage.setItem('learningPage', 1);
		}
		else{
			localStorage['learningPage'] = parseInt(localStorage['learningPage']) + 1;
		}
		if(!docCookies.hasItem('learningPage')){
			docCookies.setItem('learningPage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('learningPage')) + 1;
			docCookies.setItem('learningPage', newValue, Infinity);	
		}
	}
	if(window.location.pathname.indexOf("photoalbum") != -1){
		var localStorageAmount = localStorage.getItem('photoalbumPage');
		if(localStorageAmount == null){
			localStorage.setItem('photoalbumPage', 1);
		}
		else{
			localStorage['photoalbumPage'] = parseInt(localStorage['photoalbumPage']) + 1;
		}
		if(!docCookies.hasItem('photoalbumPage')){
			docCookies.setItem('photoalbumPage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('photoalbumPage')) + 1;
			docCookies.setItem('photoalbumPage', newValue, Infinity);	
		}
		//generatePhotoalbum();
	}	
	if(window.location.pathname.indexOf("contact") != -1){
		var localStorageAmount = localStorage.getItem('contactPage');
		if(localStorageAmount == null){
			localStorage.setItem('contactPage', 1);
		}
		else{
			localStorage['contactPage'] = parseInt(localStorage['contactPage']) + 1;
		}
		if(!docCookies.hasItem('contactPage')){
			docCookies.setItem('contactPage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('contactPage')) + 1;
			docCookies.setItem('contactPage', newValue, Infinity);	
		}

		initializePopoversForContactPage();
	}
	if(window.location.pathname.indexOf("test") != -1){
		var localStorageAmount = localStorage.getItem('testPage');
		if(localStorageAmount == null){
			localStorage.setItem('testPage', 1);
		}
		else{
			localStorage['testPage'] = parseInt(localStorage['testPage']) + 1;
		}
		if(!docCookies.hasItem('testPage')){
			docCookies.setItem('testPage', 1, Infinity);
		}
		else{
			var newValue = parseInt(docCookies.getItem('testPage')) + 1;
			docCookies.setItem('testPage', newValue, Infinity);	
		}
		
		initializePopoversForTestPage();
	}
	if(window.location.pathname.indexOf("history") != -1){
		fillTable();
	}

	setInterval(getFormattedDate, 1000);

	myInterests = document.getElementById('myInterests');
	dropdownMenu = createDropdownMenu();
	dropdownMenu.style.display = "none";
	myInterests.appendChild(dropdownMenu);

	myInterests.addEventListener("mouseover", onMouseOverMyInterests);
	myInterests.addEventListener("mouseout", onMouseOutOfMyInterests);

	if(window.location.pathname.indexOf("contact") != -1){
		calendar = createCalendar();
		calendar.style.display = "none";
		var calendarContainer = document.getElementById('calendarContainer');
		calendarContainer.appendChild(calendar);
	}
}
/*lab4*/
function initializePopoversForContactPage(){
	$("#FIO").popover({
		title: "Пример правильного ввода",
		content: "Иванов Иван Иванович",
		trigger: "hover",
		delay: {"show": 100, "hide": 1000}
	});
	$("#telephone").popover({
		title: "Пример правильного ввода",
		content: "+79781234567",
		trigger: "hover",
		delay: {"show": 100, "hide": 1000}
	})
}
function initializePopoversForTestPage(){
	$("#FIO").popover({
		title: "Пример правильного ввода",
		content: "Иванов Иван Иванович",
		trigger: "hover",
		delay: {"show": 100, "hide": 1000}
	});
	$("#question3").popover({
		title: "Формат ввода",
		content: "Не более 30 слов",
		trigger: "hover",
		delay: {"show": 100, "hide": 1000} 
	})
}

/*end of lab4*/
var cursorIsOutOfPhotoviewer = false;
function onMouseOutOfMyInterests(){
	dropdownMenu.style.display = "none";
}
function onMouseOverMyInterests(){
	dropdownMenu.style.display = "block";
}
function createDropdownMenu(){
	var ul = document.createElement('ul');
	ul.className = 'dropdown-menu';
	var li = [];
	for(let i = 0; i < 4; i++){
		li[i] = document.createElement('li');
	}
	var a = [];
	a[0] = document.createElement('a');
	a[1] = document.createElement('a');
	a[2] = document.createElement('a');
	a[3] = document.createElement('a');

	a[0].setAttribute('href', 'myinterests#hobbyAnchor');
	a[1].setAttribute('href', 'myinterests#booksAnchor');
	a[2].setAttribute('href', 'myinterests#musicAnchor');
	a[3].setAttribute('href', 'myinterests#movieAnchor');
	a[0].innerHTML = "Хобби";
	a[1].innerHTML = "Книги";
	a[2].innerHTML = "Музыка";
	a[3].innerHTML = "Фильмы";

	for(let i = 0; i < li.length; i++){
		li[i].appendChild(a[i]);
		ul.appendChild(li[i]);
	}
	return ul;
}
function getFormattedDate(){
	var dateElem = document.getElementById('date');
	var currentDate = new Date();
	/*hh.mm.YY dayName time*/
	var date = formatValue(currentDate.getDate());
	var month = formatValue(currentDate.getMonth()+1);
	var hours = formatValue(currentDate.getHours());
	var minutes = formatValue(currentDate.getMinutes());
	var seconds = formatValue(currentDate.getSeconds());
	dateElem.innerHTML = date + "." + month + "." + (1900+currentDate.getYear()) + " " + 
						getDayName("long",currentDate.getDay()) + " " +
						hours +":"+ minutes +":"+ seconds;
	function formatValue(v){
		return ((v < 10)?"0"+v:v);
	}
}
function getDayName(type, day){
	if(type == "short"){
		switch(day){
			case 0: return "ВС";
			case 1: return "ПН";
			case 2: return "ВТ";
			case 3: return "СР";
			case 4: return "ЧТ";
			case 5: return "ПТ";
			case 6: return "СБ";
		}
	}
	if(type == "long"){
		switch(day){
			case 0: return "Воскресенье";
			case 1: return "Понедельник";
			case 2: return "Вторник";
			case 3: return "Среда";
			case 4: return "Четверг";
			case 5: return "Пятница";
			case 6: return "Суббота";
		}
	}
}

var table;
function createCalendar(){
	var calendar = document.createElement('div');
	calendar.id = 'calendar';

	var dateMonth = document.createElement('div');
	dateMonth.id = 'dateMonth'
	dateMonth.className = "row";

	var year = document.createElement('div');
	year.className = "col-sm-6";

	var birthYearLabel = document.createElement('label');
	birthYearLabel.setAttribute('for', 'birthYear');
	birthYearLabel.innerHTML = "Год";

	var birthYearSelect = document.createElement('select');
	birthYearSelect.id = 'birthYear';
	birthYearSelect.className = "form-control";
	birthYearSelect.setAttribute('onchange', 'onCalendarYearOrMonthChanged(event)');
	for(var i = 1960; i < 2017; i++){
		var option = document.createElement('option');
		option.value = i;
		option.innerHTML = i;
		birthYearSelect.appendChild(option);
	}
	year.appendChild(birthYearLabel);
	year.appendChild(birthYearSelect);
	dateMonth.appendChild(year);

	var month = document.createElement('div');
	month.className = "col-sm-6";

	var birthMonthLabel = document.createElement('label');
	birthMonthLabel.setAttribute('for', 'birthMonth');
	birthMonthLabel.innerHTML = "Месяц";

	var birthMonthSelect = document.createElement('select');
	birthMonthSelect.id = 'birthMonth';
	birthMonthSelect.className = "form-control";
	birthMonthSelect.setAttribute('onchange', 'onCalendarYearOrMonthChanged(event)');
	for(var i = 0; i < 12; i++){
		var option = document.createElement('option');
		option.value = i;
		option.innerHTML = getMonthNameById(i);
		birthMonthSelect.appendChild(option);
	}
	month.appendChild(birthMonthLabel);
	month.appendChild(birthMonthSelect);
	dateMonth.appendChild(month);

	calendar.appendChild(dateMonth);

	table = getTable(1960, 0);
	calendar.appendChild(table);
	return calendar;
}
function getTable(year, month){
	var table = document.createElement('table');
	table.className = 'table table-bordered';
	
	var date = new Date(year, month,1);

	var rows = [];
	rows[0] = document.createElement('tr');
	var dayNameId = date.getDay();
	for(var i = dayNameId; i < 7; i++){
		var th = document.createElement('th');
		th.innerHTML = getDayName("short", i);
		th.style.textAlign = "center";
		th.style.padding = "13px";
		rows[0].appendChild(th);
	}
	for(var i = 0; i < dayNameId; i++){
		var th = document.createElement('th');
		th.innerHTML = getDayName("short", i);
		th.style.textAlign = "center";
		th.style.padding = "13px";
		rows[0].appendChild(th);
	}

	for(var i = 0, q = 0; i < 7 * Math.ceil(daysInMonth(year, month)/7); i++){
		
		if(i % 7 == 0 ){
			q++;
			rows[q] = document.createElement('tr');			
		}
		var btn = document.createElement('button');
		btn.className = "btn btn-warning";
		btn.innerHTML = i+1;
		btn.style.minWidth = "42px";
		btn.style.minHeight = "42px";
		btn.style.margin = "3px";
		btn.addEventListener("click", onDayClick);
		
		var td = document.createElement('td');
		if(i < daysInMonth(year, month)){
			td.appendChild(btn);
		}
		rows[q].appendChild(td);
	}
	for(var i = 0; i < rows.length; i++){
		table.appendChild(rows[i]);
	}
	table.style.marginTop = "10px";
	return table;
}
var selectedDay = null;
function onCalendarYearOrMonthChanged(event){
	var birthMonth = document.getElementById('birthMonth');
	var selectedMonth = birthMonth.options[birthMonth.selectedIndex].value;
	var birthYear = document.getElementById('birthYear');
	var selectedYear = birthYear.options[birthYear.selectedIndex].value;
	calendar.removeChild(table);
	table = getTable(selectedYear, selectedMonth);
	calendar.appendChild(table);
	selectedDay = null;
	showBirthday();
	event.preventDefault();
}
function onDayClick(event){
	if(selectedDay != null){
		selectedDay.className = "btn btn-warning";
	}
	selectedDay = event.target;
	selectedDay.className = "btn btn-success";
	showBirthday();	
	event.preventDefault();
}
function showBirthday(){
	var birthMonth = document.getElementById('birthMonth');
	var month = birthMonth.options[birthMonth.selectedIndex].value;
	month++;
	var birthYear = document.getElementById('birthYear');
	var year = birthYear.options[birthYear.selectedIndex].value;
	var day;
	if(selectedDay == null){
		day = "--";
	}else{
		day = selectedDay.innerText;
	}
	document.getElementById('birthDate').value = year + "/" + (((month) < 10)?"0"+month:month) + "/" + ((day < 10)?"0"+day:day);
}
function daysInMonth(year, month){
	return 33 - new Date(year, month, 33).getDate();
}
var calendarIsVisible = false;
function showCalendar(event){
	calendarIsVisible = !calendarIsVisible;
	if(calendarIsVisible){
		calendar.style.display = "block";
	}
	else{
		calendar.style.display = "none";	
	}
	//showBirthday();
	event.preventDefault();
}
function getMonthNameById(i){
	switch(i){
		case 0: return "Январь";
		case 1: return "Февраль";
		case 2: return "Март";
		case 3: return "Апрель";
		case 4: return "Май";
		case 5: return "Июнь";
		case 6: return "Июль";
		case 7: return "Август";
		case 8: return "Сентябрь";
		case 9: return "Октябрь";
		case 10: return "Ноябрь";
		case 11: return "Декабрь";
	}
}