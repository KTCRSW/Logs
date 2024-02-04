<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<?php



?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/datepicker.min.js"></script>

<?php
require_once '../DB/db.php';
include '../Asset/Header.php';
include '../Asset/SideNav.php';

?>


<div class="p-4 flex justify-center items-center h-screen sm:ml-64 mt-5 ">

    <form class="w-full max-w-lg" action="#" method="post" id="InsertForm">
        <center>
            <p class="mt-[5%] mb-5" style="font-size: 22px;">บันทึกข้อมูล</p>
            <hr class="mb-5">
        </center>
        
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    คำนำหน้า
                </label>

            </div>
            <div class="md:w-2/3">
                <select id="countries" name="__Prefix" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400">
                    <option selected disabled>-- โปรดเลือกคำนำหน้าชื่อ --</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    ชื่อจริง - นามสกุล
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" id="inline-password" type="text" placeholder="" name="__FullName" required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    ที่อยู่
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" id="inline-password" type="text" placeholder="" name="__Address" required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    ตำแหน่ง
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" id="inline-password" type="text" placeholder="" name="__Position" required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    สถานะ
                </label>

            </div>
            <div class="md:w-2/3">
                <select id="countries" name="__Status" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400">
                    <option selected disabled>-- โปรดเลือกตำแหน่งหน้าที่ --</option>
                    <option value="0">พ้นสภาพการทำงาน</option>
                    <option value="1">พนักงานทั่วไป</option>
                </select>
            </div>
        </div>
        <div class="w-full   items-center">
            <div class="w-full gap-2 flex justify-end max-[767px]:justify-center     ">
                <button type="button" id="Submit" class="shadow bg-[#01cc85]  focus:shadow-outline hover:bg-green-500 focus:outline-none text-white font-bold py-2 px-8 rounded" type="button">
                    บันทึก
                    <i class="fa-regular fa-floppy-disk"></i></button>

                <button onclick="history.back();" class="shadow bg-red-500  focus:shadow-outline hover:bg-red-400 focus:outline-none text-white font-bold py-2 px-8 rounded" type="button">
                    กลับ
                </button>
            </div>
        </div>
    </form>

</div>
<script type="text/javascript">
    $(function() {
        $('#Submit').click(function() {
            var emptyData = false;

            $('input[type="text"]').each(function() {
                if ($(this).val().trim() === "") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'คำเตือน',
                        text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                        showCancelButton: false,
                        showConfirmButton: true
                    });
                    emptyData = true;
                    return false;
                }
            });

            if (emptyData) {
                return;
            }

            $.ajax({
                type: "POST",
                url: "../App/CreateUser.php",
                data: $("#InsertForm").serialize(),
                success: function(result) {
                    var icon = (result.status == 0) ? 'error' : 'success';
                    var title = (result.status == 0) ? 'เกิดข้อผิดพลาด' : 'สำเร็จ';

                    Swal.fire({
                        icon: icon,
                        title: title,
                        text: (result.status == 0) ? 'บันทึกข้อมูลไม่สำเร็จ' : 'บันทึกข้อมูลสำเร็จ',
                        showCancelButton: false,
                        showConfirmButton: true
                    });

                    if (result.status == 1) {
                        location.href = "./User.php";
                    }
                }
            });
        });
    });
</script>
