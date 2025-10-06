// main.js
document.addEventListener('DOMContentLoaded', () => {
  const stepperElement = document.querySelector('#error-stepper');
  if (stepperElement && window.HSStepper) {
    const errorStepper = HSStepper.getInstance('#error-stepper');
    let errorSuccessState = 1;

    errorStepper.on('beforeNext', (ind) => {
      if (ind === 2) {
        errorStepper.setProcessedNavItem(ind);

        setTimeout(() => {
          errorStepper.unsetProcessedNavItem(ind);
          errorStepper.enableButtons();

          if (errorSuccessState) {
            errorStepper.goToNext();
          } else {
            errorStepper.setErrorNavItem(ind);
          }

          errorSuccessState = !errorSuccessState;
        }, 2000);
      }
    });
  } else {
    console.warn('Stepper element or HSStepper not found.');
  }
});
