<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<?php

require_once '../DB/db.php';
include '../Asset/Header.php';
include '../Asset/SideNav.php';




?>
<div class="p-4 sm:ml-64 mt-20">

    <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ค้นหา" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ค้นหา</button>
        </div>
    </form>

    <a href="./AddNewTechnician.php" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="shadow bg-[#01cc85] focus:shadow-outline hover:bg-green-300 mb-2 focus:outline-none text-white font-bold py-2 px-8 rounded" style="text-decoration:none; ">
        เพิ่มรายชื่อพนักงาน
    </a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            ชื่อ-สกุล
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            ตำแหน่ง
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            ที่อยู่
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            สถานะ
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            จัดการ
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>


                </tr>
            </thead>
            <tbody>
                <?php

                $getData = "SELECT * FROM technician";
                $result = $db->query($getData);


                while ($data = mysqli_fetch_assoc($result)) {


                ?>
                    <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                        <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-black">
                            <?php echo "ITID00" . $data['TechnicianID']; ?>
                        </th>
                        <td class="px-6 py-4 text-black">
                            <?php echo $data['TechnicianName']; ?>

                        </td>
                        <td class="px-6 py-4 text-black">
                            <?php echo $data['TechnicianPosition']; ?>
                        </td>
                        <td class="px-6 py-4 text-black">
                            <?php echo $data['TechnicianAddress']; ?>
                        </td>
                        <td class="px-6 py-4 text-black">
                            <?php


                            if ($data['TechnicianStatus'] == 0) {
                                echo '<p style="color:red;">พ้นสภาพการทำงาน</p>';
                            } else if ($data['TechnicianStatus'] == 1) {
                                echo '<p style="color:green;">พนักงานทั่วไป</p>';
                            }


                            ?>
                        </td>
                        <td>
                            <form action="" id="removeData" method="POST">
                                <input type="text" name="__UserID" id="__UserID" value="<?php echo $data['TechnicianID']; ?>" hidden>
                                <button type="buttton" id="removeSubmit" class=" mt-2 shadow bg-[red] focus:shadow-outline hover:bg-red-600 mb-2 focus:outline-none text-white font-bold py-2 px-8 rounded">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>

</div>


<script>
    function printPdf() {
        const caseID = document.querySelector('input[name="__caseNumber"]').value;

        document.getElementById('caseIDField').value = caseID;

        document.getElementById('printForm').submit();
    }
    
    $(document).ready(function() {
        $('#removeSubmit').click(function() {
            var EmptyData = false;
            $('input[type="__UserID"]').each(function() {
                if ($(this).val().trim() === "") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'คำเตือน',
                        text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                        showCancelButton: false,
                        showConfirmButton: true
                    });
                    EmptyData = true;
                    return false;
                }
            });
            if (EmptyData) {
                return;
            }
            $.ajax({
                type: "POST",
                url: "../App/RemoveUser.php",
                data: $("#removeData").serialize(),
                success: function(result) {
                    if (result.status == 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'บันทึกข้อมูลไม่สำเร็จ',
                            showCancelButton: false,
                            showConfirmButton: true
                        }).then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: 'ลบข้อมูลสำเร็จ',
                            showCancelButton: false,
                            showConfirmButton: true
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            });
        });
    });
</script>

