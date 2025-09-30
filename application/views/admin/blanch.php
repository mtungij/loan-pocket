<?php
// 1. Include the NEW header (which contains html, head, body, top navbar, mobile breadcrumb, main sidebar)
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE THIS AND LOAD FROM YOUR CONTROLLER ---
// if (!isset($region)) {
//     $region = [
//         (object)['region_id' => 1, 'region_name' => 'Arusha'],
//         (object)['region_id' => 2, 'region_name' => 'Dar es Salaam'],
//         (object)['region_id' => 3, 'region_name' => 'Dodoma'],
//     ];
// }
// if (!isset($blanch)) {
//     $blanch = [
//         (object)['blanch_id' => 101, 'blanch_name' => 'HQ Branch', 'blanch_no' => '0711223344', 'region_id' => 2, 'region_name' => 'Dar es Salaam'],
//         (object)['blanch_id' => 102, 'blanch_name' => 'Northern Zone', 'blanch_no' => '0755667788', 'region_id' => 1, 'region_name' => 'Arusha'],
//     ];
// }
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64"> <?php // Main content wrapper from the new template ?>
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                    Manage Branches
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Add, edit, and view company branches.
                </p>
            </div>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </span>
                </div>
                <div class="ms-3">
                    <h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p>
                </div>
                <div class="ps-3 ms-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]">
                            <span class="sr-only">Dismiss</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php // You can add another block for error flash messages ('mass') if needed, styled with red colors ?>


        <!-- Card: Add Branch Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Add Branch
                </h3>

                <?php echo form_open("admin/create_blanch", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="blanch_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* Branch name:</label>
                            <input type="text" id="blanch_name" name="blanch_name" placeholder="Branch name" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" value="<?php echo set_value('blanch_name'); ?>">
                            <?php echo form_error("blanch_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="region_id" class="block text-sm font-medium mb-2 dark:text-gray-300">* Branch region:</label>
                            <select id="region_id" name="region_id" required
                                    class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600">
                                <option value="">Select Region</option>
                                <?php if (isset($region) && is_array($region)): ?>
                                    <?php foreach ($region as $regions_item): ?>
                                    <option value="<?php echo htmlspecialchars($regions_item->region_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo set_select('region_id', $regions_item->region_id); ?>>
                                        <?php echo htmlspecialchars($regions_item->region_name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?php echo form_error("region_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="blanch_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* Branch Phone Number:</label>
                            <input type="number" id="blanch_no" name="blanch_no" placeholder="Branch phone number" required autocomplete="off"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" value="<?php echo set_value('blanch_no'); ?>">
                             <?php echo form_error("blanch_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>

                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Save
                            </button>
                            <button type="reset" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 dark:focus:outline-none dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Cancel
                            </button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Card: Add Branch Form -->


        <!-- Card: Branch List Table with Preline DataTables -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Branch List</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View, edit, or delete branches.</p>
                </div>
            </div>

            <div class="p-4" data-hs-datatable='{
                "pageLength": 10,
                "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 inline-flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-gray-700 dark:hover:bg-gray-700" },
                "language": { "zeroRecords": "<div class=\"py-10 px-5 flex flex-col justify-center items-center text-center\"><svg class=\"shrink-0 size-6 text-gray-500 dark:text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"11\" cy=\"11\" r=\"8\"/><path d=\"m21 21-4.3-4.3\"/></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-gray-400\">No branches found.</p></div></div>" }
            }'>
                <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                    <div class="relative max-w-xs w-full">
                        <label for="branch-table-search" class="sr-only">Search</label>
                        <input type="text" name="branch-table-search" id="branch-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" placeholder="Search branches..." data-hs-datatable-search="#branch_table">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                            <svg class="size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                        </div>
                    </div>
                </div>
<a href="<?php echo base_url('admin/download_branches_pdf'); ?>" 
   class="py-2 px-4 bg-cyan-600 text-white rounded hover:bg-cyan-700">
   Download PDF
</a>

                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="branch_table">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">S/No.</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Branch Name</span>
                                                <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path>
                                                    <path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path>
                                                </svg>
                                            </div>
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Branch Code</span>
                                                 <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path>
                                                    <path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path>
                                                </svg>
                                            </div>
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Phone</span>
                                                 <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path>
                                                    <path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Region</span>
                                                 <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path>
                                                    <path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path>
                                                </svg>
                                            </div>
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Region Code</span>
                                                 <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path>
                                                    <path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path>
                                                </svg>
                                            </div>

                                        <th scope="col" class="py-3 px-6 text-start font-normal focus:outline-none --exclude-from-ordering">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Status</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-end font-normal focus:outline-none --exclude-from-ordering">
                                            <div class="inline-flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Action</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php $no = 1; ?>
                                    <?php if (isset($blanch) && is_array($blanch) && !empty($blanch)): ?>
                                        <?php foreach ($blanch as $blanch_item): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no++; ?>.</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($blanch_item->blanch_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($blanch_item->branch_code, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($blanch_item->blanch_no, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($blanch_item->region_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($blanch_item->region_code, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="py-1 px-2.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                                                    Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                    <button id="hs-table-action-<?php echo $blanch_item->blanch_id; ?>" type="button" class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                                                        Action
                                                        <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-action-<?php echo $blanch_item->blanch_id; ?>">
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500">Choose an option</span>
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                               href="#" data-hs-overlay="#hs-edit-branch-modal-<?php echo $blanch_item->blanch_id; ?>">
                                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg> Edit
                                                            </a>
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                               href="<?php echo base_url("admin/view_blanch_customer/{$blanch_item->blanch_id}"); ?>">
                                                               <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Customer
                                                            </a>
                                                        </div>
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 focus:ring-2 focus:ring-red-500 dark:text-red-500 dark:hover:bg-gray-700"
                                                               href="<?php echo base_url("admin/delete_blanch/{$blanch_item->blanch_id}"); ?>" onclick="return confirm('Are you sure you want to delete this branch?')">
                                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <?php // This row will be hidden by DataTables if it shows its own "zeroRecords" message ?>
                                        <tr class="data-[dt-styles=dt-empty]:hidden">
                                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                                No branches found.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Pagination (auto-generated by Preline HSDataTable) -->
                <div class="py-3 px-4 border-t border-gray-200 dark:border-gray-700 hidden" data-hs-datatable-paging="">
                    <nav class="flex items-center space-x-1">
                        <button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-prev="">
                            <span aria-hidden="true">«</span><span class="sr-only">Previous</span>
                        </button>
                        <div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-gray-700" data-hs-datatable-paging-pages=""></div>
                        <button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-next="">
                            <span class="sr-only">Next</span><span aria-hidden="true">»</span>
                        </button>
                    </nav>
                </div>
                <!-- End Pagination -->
            </div>
        </div>
        <!-- End Card: Branch List Table -->


        <?php // Modals for Edit Branch (Generated outside the table loop) ?>
        <?php if (isset($blanch) && is_array($blanch)): ?>
            <?php foreach ($blanch as $blanch_item): ?>
            <div id="hs-edit-branch-modal-<?php echo $blanch_item->blanch_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">
                                Edit Branch: <?php echo htmlspecialchars($blanch_item->blanch_name, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                            <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-branch-modal-<?php echo $blanch_item->blanch_id; ?>">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>
                        <div class="p-4 sm:p-6 overflow-y-auto">
                            <?php echo form_open("admin/modify_blanch/{$blanch_item->blanch_id}"); ?>
                                <div class="space-y-4">
                                    <div>
                                        <label for="modal_blanch_name_<?php echo $blanch_item->blanch_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Branch name:</label>
                                        <input type="text" id="modal_blanch_name_<?php echo $blanch_item->blanch_id; ?>" name="blanch_name" value="<?php echo htmlspecialchars($blanch_item->blanch_name, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                    </div>
                                    <div>
                                        <label for="modal_region_id_<?php echo $blanch_item->blanch_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Branch Region:</label>
                                        <select id="modal_region_id_<?php echo $blanch_item->blanch_id; ?>" name="region_id" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                            <?php if (isset($region) && is_array($region)): ?>
                                                <?php foreach ($region as $regions_item_modal): ?>
                                                <option value="<?php echo htmlspecialchars($regions_item_modal->region_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($blanch_item->region_id == $regions_item_modal->region_id) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($regions_item_modal->region_name, ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="modal_blanch_no_<?php echo $blanch_item->blanch_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Branch phone number:</label>
                                        <input type="number" id="modal_blanch_no_<?php echo $blanch_item->blanch_id; ?>" name="blanch_no" value="<?php echo htmlspecialchars($blanch_item->blanch_no, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end items-center gap-x-2 py-3">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-branch-modal-<?php echo $blanch_item->blanch_id; ?>">
                                        Close
                                    </button>
                                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700">
                                        Update
                                    </button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- End Modals -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
// 2. Include the NEW footer (which contains JS includes)
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Script for cmd+a fix for DataTables search input (if used) ?>
<script>
window.addEventListener('load', () => {
  setTimeout(() => {
    const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
    inputs.forEach((input) => {
      input.addEventListener('keydown', function (evt) {
        if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
          this.select();
        }
      });
    });
  }, 500);
});
</script>