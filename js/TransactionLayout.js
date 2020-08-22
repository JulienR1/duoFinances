const form = document.querySelector("form");

function switchLayout(event) {
  const isRefund = event.srcElement.checked;
  if (isRefund) {
    form.setAttribute("isRefund", "");
  } else {
    form.removeAttribute("isRefund");
  }
}
