export function trapFocus(e, modalId) {
  const isTabPressed = e.key === `Tab` || e.keyCode === 9;

  if (!isTabPressed) {
    return;
  }

  const focusableElements = `button, [href], input, select, textarea, iframe, [tabindex]:not([tabindex="-1"])`;
  const modal = document.getElementById(modalId);
  // get focusable elements in modal
  const firstFocusableElement = modal.querySelectorAll(focusableElements)[0];
  const focusableContent = modal.querySelectorAll(focusableElements);
  const lastFocusableElement = focusableContent[focusableContent.length - 1];

  if (e.shiftKey) {
    if (document.activeElement === firstFocusableElement) {
      lastFocusableElement.focus();
      e.preventDefault();
    }
  } else if (document.activeElement === lastFocusableElement) {
    firstFocusableElement.focus();
    e.preventDefault();
  }
}