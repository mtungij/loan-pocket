<?php
include_once APPPATH . "views/partials/guest_header.php";
?>

<body class="bg-gray-100 dark:bg-gray-800"> <?php // Default body background, overridden by your image ?>

  <style>
    /*
      Keeping your explicit background style as requested.
      Consider moving to Tailwind utility classes for easier management in the future if feasible:
      e.g., class="bg-[url('<?php echo base_url(); ?>assets/img/mikoposoft.PNG')] bg-no-repeat bg-fixed bg-cover" (or bg-fill)
    */
    body {
      background-image: url('<?php echo base_url(); ?>assets/img/finance.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%; /* Stretches image, may distort */
    }
  </style>

  <div class="font-poppins min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
    <?php // Centering wrapper ?>

    <!-- <div class="mb-6 text-center">
      <?php // Main title for the page ?>
      <h2 class="text-3xl sm:text-4xl font-bold text-cyan-600 dark:text-cyan-500">
        Employee Login
      </h2>
    </div> -->

    <?php // Main Login Card ?>
    <div class="w-full max-w-md">
      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Login to Your Account</h1>

            <?php // Admin/Employee toggle links from your old panel-heading ?>
            <div class="mt-3 mb-4 text-center">
              <a href="<?php echo base_url("welcome/admin_login"); ?>" class="inline-flex items-center gap-x-1 text-sm text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Placeholder Key Icon ?>
                  <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v2.586l-2.293-2.293a1 1 0 00-1.414 1.414L7.586 7H5a1 1 0 000 2h2.586l-2.293 2.293a1 1 0 101.414 1.414L9 10.414V13a1 1 0 102 0v-2.586l2.293 2.293a1 1 0 001.414-1.414L12.414 9H15a1 1 0 100-2h-2.586l2.293-2.293a1 1 0 00-1.414-1.414L11 4.586V3a1 1 0 00-1-1zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
             
              </a>
              <span class="mx-2 text-gray-400 dark:text-gray-500">|</span>
              <a href="<?php echo base_url("welcome/employee_login"); ?>" class="inline-flex items-center gap-x-1 text-sm text-orange-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-orange-400">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Placeholder Key Icon ?>
                   <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v2.586l-2.293-2.293a1 1 0 00-1.414 1.414L7.586 7H5a1 1 0 000 2h2.586l-2.293 2.293a1 1 0 101.414 1.414L9 10.414V13a1 1 0 102 0v-2.586l2.293 2.293a1 1 0 001.414-1.414L12.414 9H15a1 1 0 100-2h-2.586l2.293-2.293a1 1 0 00-1.414-1.414L11 4.586V3a1 1 0 00-1-1zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
               
              </a>
            </div>
          </div>

          <?php // Flash Messages - Tailwind styled (both shown as danger as per original) ?>
          <?php if ($das = $this->session->flashdata('massage')): ?>
          <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
             <div class="flex">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="m15 9-6 6"></path>
                  <path d="m9 9 6 6"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm"><?php echo $das;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($das = $this->session->flashdata('mass')): ?>
          <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
             <div class="flex">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="m15 9-6 6"></path>
                  <path d="m9 9 6 6"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm"><?php echo $das;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <!-- Form -->
          <?php echo form_open("welcome/Employee_signin", ['class' => 'mt-5 grid gap-y-4']); // Form action updated ?>
            <!-- Form Group for Employee Phone Number -->
            <div>
              <label for="empl_no" class="block text-sm mb-2 dark:text-white">Phone Number</label>
              <div class="relative">
                <?php // type="tel" is semantically better for phone numbers ?>
                <input type="tel" id="empl_no" name="empl_no" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="Enter Your phone number">
                <?php
                  // Input name and error key updated to empl_no
                  $empl_no_error = form_error("empl_no");
                  if ($empl_no_error):
                ?>
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                  <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                </div>
                <?php endif; ?>
              </div>
              <?php if ($empl_no_error): ?>
                <p class="text-xs text-red-600 mt-2" id="empl_no-error"><?php echo strip_tags($empl_no_error); ?></p>
              <?php endif; ?>
            </div>
            <!-- End Form Group -->

            <!-- Form Group for Password -->
            <div>
              <div class="flex flex-wrap justify-between items-center gap-2">
                <label for="password" class="block text-sm dark:text-white">Password</label>
                <?php // "Forgot password?" from new template. Adjust link if needed or remove. ?>
                <a class="inline-flex items-center gap-x-1 text-sm text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="#">Forgot password?</a>
              </div>
              <div class="relative mt-2">
                <input type="password" id="password" name="password" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="******">
                <?php
                  $password_error = form_error("password");
                  if ($password_error):
                ?>
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                  <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                </div>
                <?php endif; ?>
              </div>
               <?php if ($password_error): ?>
                <p class="text-xs text-red-600 mt-2" id="password-error"><?php echo strip_tags($password_error); ?></p>
              <?php endif; ?>
            </div>
            <!-- End Form Group -->

            <!-- Checkbox  -->
            <div class="flex items-center">
              <div class="flex">
              
              </div>
              <div class="ms-3">
               
              </div>
            </div>
            <!-- End Checkbox -->

            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 disabled:opacity-50 disabled:pointer-events-none">Login</button>
          <?php echo form_close(); ?>
          <!-- End Form -->

            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
            Dont have an account?
            <a class="text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="<?php echo base_url("welcome/register"); ?>">
              Sign Up
            </a>
          </p>

<!-- <div class="mt-4 text-center text-sm text-white">
  <h2 class="text-lg font-semibold mb-2 text-green-700">Support</h2>

  <div class="flex flex-col items-center space-y-2">

    <a href="https://wa.me/255629364847" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 rounded hover:bg-green-700">
      <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12a11.95 11.95 0 0 0 1.63 6.06L0 24l6.34-1.65A11.95 11.95 0 0 0 12 24c6.63 0 12-5.37 12-12a11.94 11.94 0 0 0-3.48-8.52zM12 22a9.93 9.93 0 0 1-5.12-1.4l-.37-.23-3.76.98.99-3.66-.24-.38A9.94 9.94 0 1 1 12 22zm5.37-7.58c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15s-.77.97-.95 1.17-.35.22-.65.07a8.05 8.05 0 0 1-2.37-1.46 8.88 8.88 0 0 1-1.63-2.03c-.17-.3 0-.46.13-.62.13-.14.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38 0-.53-.05-.15-.65-1.56-.9-2.12-.24-.57-.48-.5-.67-.5H7.6c-.2 0-.52.07-.8.38s-1.05 1.03-1.05 2.5c0 1.46 1.07 2.87 1.23 3.07.15.2 2.1 3.22 5.07 4.51.7.3 1.26.48 1.69.61.71.23 1.36.2 1.87.13.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/>
      </svg>
      <span>Chat with us: 255629364847</span>
    </a>

 
    <a href="https://wa.me/255748470181" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 rounded hover:bg-green-700">
      <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12a11.95 11.95 0 0 0 1.63 6.06L0 24l6.34-1.65A11.95 11.95 0 0 0 12 24c6.63 0 12-5.37 12-12a11.94 11.94 0 0 0-3.48-8.52zM12 22a9.93 9.93 0 0 1-5.12-1.4l-.37-.23-3.76.98.99-3.66-.24-.38A9.94 9.94 0 1 1 12 22zm5.37-7.58c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15s-.77.97-.95 1.17-.35.22-.65.07a8.05 8.05 0 0 1-2.37-1.46 8.88 8.88 0 0 1-1.63-2.03c-.17-.3 0-.46.13-.62.13-.14.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38 0-.53-.05-.15-.65-1.56-.9-2.12-.24-.57-.48-.5-.67-.5H7.6c-.2 0-.52.07-.8.38s-1.05 1.03-1.05 2.5c0 1.46 1.07 2.87 1.23 3.07.15.2 2.1 3.22 5.07 4.51.7.3 1.26.48 1.69.61.71.23 1.36.2 1.87.13.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/>
      </svg>
      <span>Chat with us: 255781986080</span>
    </a>
  </div>
</div> -->



          <?php // This version of the login page also did NOT have a "Sign up here" link.
                // Omitted for consistency with the original.
          ?>

        </div>
      </div>
    </div>

  </div> <?php // End centering div ?>

<?php
include_once APPPATH . "views/partials/footer.php";
?>