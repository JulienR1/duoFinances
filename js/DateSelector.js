dateForm = document.getElementById("dateSelector");
monthButtons = document.querySelectorAll("#dateSelector ul button");

document.addEventListener("DOMContentLoaded", () => {
  document.body.addEventListener("click", () => closeSelector());
  document.getElementById("dateSelector").addEventListener("click", (event) => {
    event.stopPropagation();
  });
});

function openDateSelector(event) {
  event.preventDefault();
  event.stopPropagation();
  dateForm.toggleAttribute("active");
}

function closeSelector() {
  dateForm.removeAttribute("active");
}
