const form = document.querySelector("form");

function switchLayout(event) {
  const isRefund = event.srcElement.checked;
  if (isRefund) {
    form.setAttribute("isRefund", "");
  } else {
    form.removeAttribute("isRefund");
  }
}

function disableReceiver(event) {
  const id = event.srcElement.value;
  const receivers = document.querySelectorAll("#refund-only input");
  receivers.forEach((receiver) => {
    receiver.disabled = false;
    if (receiver.value == id) {
      receiver.disabled = true;
    }
  });
}
