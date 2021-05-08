const initApp = () => {
  document.getElementById("buttons").addEventListener("click", resetSelection);
}

document.addEventListener("DOMContentLoaded", initApp);

const resetSelection = () => {
 
  const selectMenuOptions = document.querySelectorAll("#authcat_selection select option");
 
  selectMenuOptions.forEach(option => {
    if (option.text == "View All Authors" || option.text == "View All Categories") {
      option.selected = true;
      option.defaultSelected = true;
    } else {
      option.selected = false;
      option.defaultSelected = false;
    }
  });
   
}




