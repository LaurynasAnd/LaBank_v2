'use strict';

//next an event listener for "check all" checkbox will be created

//next, event listener for all check boxes will be created, for the button
const checkboxesAll = document.querySelectorAll('input[type=radio]');
for (const box of checkboxesAll){
    box.addEventListener('change', changeLineColour)
}
function changeLineColour(event){
    event.target.closest('tr').classList.toggle('active');

}