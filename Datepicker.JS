const datepicker = document.querySelector('.datepicker');
const dateInput = document.querySelector('.date-input');
const yearInput = document.querySelector('.year-input');
const monthInput = document.querySelector('.month-input');
const cancelBtn = document.querySelector('.cancel');
const applyBtn = document.querySelector('.apply');
const nextBtn = datepicker.querySelector('.next');
const prevBtn = datepicker.querySelector('.prev')
const dates = document.querySelector('.dates');

let selectedDate = new Date();
let year = selectedDate.getFullYear();
let month = selectedDate.getMonth();

//this is to show datepicker
dateInput.addEventListener('click', () =>{
    datepicker.hidden = false;
});

//for hiding the datepicker when the cancel button is pressed
cancelBtn.addEventListener('click', () =>{
    datepicker.hidden = true;
});
//hides the datepicker when it is applied as well
applyBtn.addEventListener('click', () => {
    dateInput.value = selectedDate.toLocaleDateString('en-UK', {
        year: 'numric',
        month:'2-digit',
        day:"2-digit",
    });
    datepicker.hidden = true;
});

//next and previous month buttons on the top thing
nextBtn.addEventListener('click', ()=> {
    if(month ===11) year++;
    
    //to ensure that it onnly does it 11 times because there are 12 month and JS syntax foes 0-11 month and stuff.
    month = (month + 1) % 12;
    displayDates();
});


prevBtn.addEventListener('click', ()=> {
    if(month ===0) year--;
    
    //to ensure that it onnly does it 11 times because there are 12 month and JS syntax foes 0-11 month and stuff.
    month = (month - 1+12) % 12;
    displayDates();
});

monthInput.addEventListener('change', ()=>{
    month = monthInput.selectedIndex;
    displayDates();
});

yearInput.addEventListener('change', ()=>{
    year = yearInput.value;
    displayDates();
})

const updateYearMonth = ()=>{
    monthInput.selectedIndex=month;
    yearInput.value = year;
}

const handleDateClick = (e) =>{
    const button = e.target;

    //removing the selected class from other buttons
    const selected = dates.querySelector('.selected');
    selected && selected.classList.remove('selected');

    // adding selected classes to current button
    button.classList.add('selected');

    selectedDate = new Date(year, month, parseInt(button.textContent));
}

//rendering the dates in the calnder
const displayDates = () =>{
    updateYearMonth();

    //clearing the dates
    dates.innerHTML = "";


    //displaying last week of previous month
    const lastOfPrevMonth = new Date(year,month,0);
    //console.log(lastOfPrevMonth.toDateString());
    for(let i = 0; i <= lastOfPrevMonth.getDay(); i++){
        const text = lastOfPrevMonth.getDate() - lastOfPrevMonth.getDay() + i;
        const button = createButton(i, true,false);
        dates.appendChild(button);
    }

    //displaying current month
    const lastOfMonth = new Date(year,month + 1, 0);
    //console.log(lastOfMonth.toDateString());
    for(let i = 1; i <= lastOfMonth(); i++){

        const isToday= selectedDate.getDate() === i
        && selectedDate.getFullYear() === year
        && selectedDate.getMonth() === month;

        const button = createButton(i, false, isToday);
        button.addEventListener('click', handleDateClick)
        dates.appendChild(button);
    }

    //displaung the first week of next month

    const firstOfNextMonth = new Date(year,month+1,1);
    for(let i = firstOfNextMonth.getDay(); i<7; i++){
        const text = firstOfNextMonth.getDate()- firstOfNextMonth.getDay() + i;
        const button= createButton(text,true,false);
        dates.appendChild(button);
    }
};

const createButton = (text, isDisabled = false, isToday = false) =>{
    const button = document.createElement('button');
    button.textContent = text;
    button.disabled = isDisabled;
    button.classList.toggle('today', isToday);
    return button;
};

displayDates();