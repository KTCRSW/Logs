<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<?php 

require_once '../DB/db.php';
include '../Asset/Header.php';
include '../Asset/SideNav.php';

$_SESSION['Date'] = $_POST['__caseDate'];
// echo $_POST['__caseDate'];
?>
<div class="p-4 sm:ml-64 mt-20">
    <form action="" method="post">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="live-search" class="block w-full p-4 pl-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ค้นหา" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ค้นหา</button>
        </div>
    </form>

    <div class="w-full items-center">
        <div class="w-full gap-2 flex justify-end max-[767px]:justify-center">
            <form method="POST" class="" id="" action='<?php $_SERVER['PHP_SELF']; ?>'>
                <input type="date" style="display: inline-block;" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400 " placeholder="<?php echo date("m-d-Y"); ?>" name="__caseDate" required>
                <span>
                    <button type="submit" name="submit" class="shadow bg-[#01cc85] focus:shadow-outline hover:bg-blue-500 focus:outline-none text-white font-bold py-2 px-8 rounded">
                        ดูรายงาน
                    </button>
                </span>
            </form>
            <form action="../mPDF/ResultIndividual.php">
                <input type="text" name="technician" value="<?=$_SESSION['TechnicianSession']?>" hidden>
                <button type="submit" style="display: inline-block;" class="shadow bg-[#2f69fd] focus:shadow-outline hover-bg-blue-500 focus:outline-none text-white font-bold py-2 px-8 rounded" type="button">พิมพ์ <i class="fas fa-print"></i></button>
            </form>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        เลขแจ้งเคส
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            วันที่แจ้งดำเนินงาน
                            <a href="#" id="showData"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            สถานที่เข้างาน
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ช่าง
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ช่องทางติดต่อ
                    </th>
                    <th scope="col" class="px-6 py-3">
                        โทร
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ระยะทาง
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        ดำเนินการ
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 dark:divide-opacity-50">
                <?php
                $sql = "SELECT * FROM `assignment` WHERE date(__caseDate) = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $_SESSION['Date']);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="px-6 py-4 font-bold">
                            <?= $row['caseNumber']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['caseDate']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['caseLocation']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['caseTechnician']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['caseContact']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['casePhone']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['caseRange']; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="editModal<?= $row['id']; ?>" data-modal-toggle class="text-blue-600 hover:text-blue-900">Edit</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="modal" id="editModal<?= $row['id']; ?>">
            <div class="modal__content">
                <div class="modal__header">
                    <h2>Edit Case</h2>
                    <button data-modal-close class="close-button">&times;</button>
                </div>
                <div class="modal__body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="editForm">
                        <input type="hidden" name="__caseNumber" value="<?= $row['caseNumber']; ?>">
                        <input type="hidden" name="__caseLocation" value="<?= $row['caseLocation']; ?>">
                        <input type="hidden" name="__caseDate" value="<?= $row['caseDate']; ?>">
                        <input type="hidden" name="__caseTechnician" value="<?= $row['caseTechnician']; ?>">
                        <input type="hidden" name="__caseContact" value="<?= $row['caseContact']; ?>">
                        <input type="hidden" name="__casePhone" value="<?= $row['casePhone']; ?>">
                        <input type="hidden" name="__caseRange" value="<?= $row['caseRange']; ?>">

                        <div class="mb-4">
                            <label for="__caseNumber" class="block text-gray-700 text-sm font-bold mb-2">Case Number:</label>
                            <input type="text" name="__caseNumber" value="<?= $row['caseNumber']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required readonly>
                        </div>
                        <div class="mb-4">
                            <label for="__caseLocation" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                            <input type="text" name="__caseLocation" value="<?= $row['caseLocation']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required readonly>
                        </div>
                        <div class="mb-4">
                            <label for="__caseDate" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                            <input type="date" name="__caseDate" value="<?= $row['caseDate']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="__caseTechnician" class="block text-gray-700 text-sm font-bold mb-2">Technician:</label>
                            <input type="text" name="__caseTechnician" value="<?= $row['caseTechnician']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="__caseContact" class="block text-gray-700 text-sm font-bold mb-2">Contact:</label>
                            <input type="text" name="__caseContact" value="<?= $row['caseContact']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="__casePhone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                            <input type="text" name="__casePhone" value="<?= $row['casePhone']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="__caseRange" class="block text-gray-700 text-sm font-bold mb-2">Range:</label>
                            <input type="text" name="__caseRange" value="<?= $row['caseRange']; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" required>
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue" form="editForm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    const modalBtns = document.querySelectorAll('[data-modal-toggle]');
    const closeBtns = document.querySelectorAll('[data-modal-close]');
    const overlay = document.getElementById('overlay');

    modalBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const modal = document.querySelector(btn.dataset.modalTarget);
            openModal(modal);
        });
    });

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active');
        modals.forEach(modal => {
            closeModal(modal);
        });
    });

    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const modal = btn.closest('.modal');
            closeModal(modal);
        });
    });

    function openModal(modal) {
        if (modal == null) return;
        modal.classList.add('active');
        overlay.classList.add('active');
    }

    function closeModal(modal) {
        if (modal == null) return;
        modal.classList.remove('active');
        overlay.classList.remove('active');
    }
</script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('live-search');
        const tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const caseNumber = row.querySelector('.font-bold').textContent.toLowerCase();
                const caseTechnician = row.querySelector('.px-6.py-4:nth-child(4)').textContent.toLowerCase();

                if (caseNumber.includes(searchTerm) || caseTechnician.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
