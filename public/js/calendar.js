window.onload = function (){
    calendar = createCalendar();
    calendar.style.display = "none";
    var calendarContainer = document.getElementById('calendarContainer');
    calendarContainer.appendChild(calendar);
};
var table;
function createCalendar(){
    var calendar = document.createElement('div');
    calendar.id = 'calendar';

    var dateMonth = document.createElement('div');
    dateMonth.id = 'dateMonth';
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

        if(i % 7 === 0 ){
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
    if(selectedDay !== null){
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
    if(selectedDay === null){
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