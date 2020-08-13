document.addEventListener("touchstart", handleTouchStart, false);
document.addEventListener("touchmove", handleTouchMove, false);

const summaryPanel = document.querySelector("aside");

const VISIBLE_TAG = "visible";

var xDown = null;
var yDown = null;

function getTouches(event) {
  return event.touches || event.originalEvents.touches;
}

function handleTouchStart(event) {
  const firstTouch = getTouches(event)[0];
  xDown = firstTouch.clientX;
  yDown = firstTouch.clientY;
}

function handleTouchMove(event) {
  if (!xDown || !yDown) {
    return;
  }

  var xUp = getTouches(event)[0].clientX;
  var yUp = getTouches(event)[0].clientY;

  var deltaX = xDown - xUp;
  var deltaY = yDown - yUp;

  if (Math.abs(deltaX) > Math.abs(deltaY)) {
    toggleElementVisibility(summaryPanel, deltaX < 0);
  }
}

function toggleElementVisibility(element, visibilityState) {
  if (visibilityState) element.setAttribute(VISIBLE_TAG, "");
  else element.removeAttribute(VISIBLE_TAG);
}
