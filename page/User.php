<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<?php

require_once '../DB/db.php';
include '../Asset/Header.php';
include '../Asset/SideNav.php';




?>
<div class="p-4 sm:ml-64 mt-20">

    <form>
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 pl-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="ค้นหา" required>
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ค้นหา</button>
        </div>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            ชื่อผู้ใช้งาน
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            ระดับผู้ใช้งาน
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>


                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM users";
                $query = $db->query($sql);

                while ($row = mysqli_fetch_assoc($query)):

                    ?>
                    <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                        <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-black">
                            <?php echo $row['USR_ID']; ?>
                        </th>
                        <td class="px-6 py-4 text-black">
                            <?php echo $row['USR_NAME']; ?>

                        </td>
                        <td class="px-6 py-4 text-black">
                            <?php

                            if ($row['USR_ROLE'] == 0) {
                                echo "👑" . "ผู้ดูแลระบบ";
                            }
                            if ($row['USR_ROLE'] == 1) {
                                echo "👤"."พนักงาน";
                            }


                            ?>

                        </td>
                    </tr>
                <?php
                endwhile; ?>
            </tbody>
        </table>
    </div>

</div>
<script>
    const editButtons = document.querySelectorAll('[data-modal-toggle]');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modalId = button.getAttribute('data-modal-target');
            const caseNumber = button.getAttribute('data-case-number');
            const caseLocation = button.getAttribute('data-case-location');
            const caseDate = button.getAttribute('data-case-date');
            const caseTechnician = button.getAttribute('data-case-technician');
            const caseContact = button.getAttribute('data-case-contact');
            const casePhone = button.getAttribute('data-case-phone');
            const caseRange = button.getAttribute('data-case-range');

            const modal = document.getElementById(modalId);
            const caseNumberField = modal.querySelector('input[name="__caseNumber"]');
            const caseLocationField = modal.querySelector('input[name="__caseLocation"]');
            const caseDateField = modal.querySelector('input[name="__caseDate"]');
            const caseTechnicianField = modal.querySelector('input[name="__caseTechnician"]');
            const caseContactField = modal.querySelector('input[name="__caseContact"]');
            const casePhoneField = modal.querySelector('input[name="__casePhone"]');
            const caseRangeField = modal.querySelector('input[name="__caseRange"]');

            caseNumberField.value = caseNumber;
            caseLocationField.value = caseLocation;
            caseDateField.value = caseDate;
            caseTechnicianField.value = caseTechnician;
            caseContactField.value = caseContact;
            casePhoneField.value = casePhone;
            caseRangeField.value = caseRange;
        });
    });

</script>

<script>
    function printPdf() {
        const caseID = document.querySelector('input[name="__caseNumber"]').value;

        document.getElementById('caseIDField').value = caseID;

        document.getElementById('printForm').submit();
    }
</script>