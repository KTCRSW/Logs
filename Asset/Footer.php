<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<footer class="bg-white rounded-lg shadow m-4 text-dark">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://www.facebook.com/artz.artz.7798" class="hover:underline">Kittichai & Bongkotphetr </a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a onclick="showTOS()" class="mr-4 hover:underline md:mr-6">Term Of Service.</a>
            </li>
            <li>
                <a class="mr-4 hover:underline md:mr-6" onClick="showCopyrightAlert()">Licences.</a>
            </li>
            <li>
                <a href="https://www.facebook.com/kittichai002/" class="hover:underline">Developer Contact.</a>
            </li>
        </ul>
    </div>
</footer>
<script>
    function showCopyrightAlert() {
        const copyrightText = `Copyright 2023 Kittichai & Bongkotphetr & Techasit & Suthichai
    Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
    The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.`;

        Swal.fire({
            icon: 'info',
            title: 'Copyright Notice',
            html: copyrightText,
            confirmButtonText: 'OK'
        });
    }

    function showTOS() {
  const copyrightText = `
1. ยินยอมกับข้อตกลง
   1.1 การเข้าใช้งานและ/หรือการลงทะเบียนใน Log IT NETWORK (เว็บไซต์) ถือว่าผู้ใช้ได้ยินยอมและทำตามข้อตกลงใน Term of Service นี้แล้วทุกข้อ

2. การให้บริการ
   2.1 Log IT NETWORK ให้บริการเพื่อการบันทึกและติดตามข้อมูลทางเทคโนโลยี โดยผู้ใช้ต้องปฏิบัติตามข้อกำหนดและเงื่อนไขที่กำหนดไว้ในเว็บไซต์

3. ความรับผิดชอบ
   3.1 ผู้ใช้ต้องรับผิดชอบต่อข้อมูลที่ได้รับการเข้าถึงหรือบันทึกใน Log IT NETWORK โดยผู้ใช้ตกลงว่าจะไม่นำข้อมูลที่ไม่เหมาะสมหรือทำให้เกิดความเสียหายแก่ผู้อื่น

4. การลงทะเบียนและบัญชีผู้ใช้
   4.1 การลงทะเบียนใน Log IT NETWORK ต้องทำโดยใช้ข้อมูลที่ถูกต้องและปัจจุบัน ผู้ใช้ต้องรักษาความลับของบัญชีผู้ใช้และไม่ให้บุคคลอื่นใช้งานบัญชีของตน

5. การเปลี่ยนแปลง Term of Service
   5.1 Log IT NETWORK ขอสงวนสิทธิ์ในการเปลี่ยนแปลง Term of Service โดยไม่ต้องแจ้งให้ทราบล่วงหน้า ผู้ใช้ต้องตรวจสอบ Term of Service อย่างสม่ำเสมอ

6. ลิขสิทธิ์และเจ้าของลิขสิทธิ์
   6.1 ข้อมูลทั้งหมดใน Log IT NETWORK เป็นทรัพย์สินทางปัญญาของ Log IT NETWORK ห้ามทำซ้ำ, แก้ไข, หรือใช้งานโดยไม่ได้รับอนุญาตจาก Log IT NETWORK

7. การสิ้นสุดการให้บริการ
   7.1 Log IT NETWORK ขอสงวนสิทธิ์ในการสิ้นสุดการให้บริการต่อผู้ใช้ที่ไม่ปฏิบัติตาม Term of Service นี้

8. การติดต่อ
   8.1 ผู้ใช้สามารถติดต่อ Log IT NETWORK ผ่านช่องทางที่กำหนดไว้ในเว็บไซต์

9. ข้อกำหนดอื่น ๆ
   9.1 Term of Service นี้อาจมีการเพิ่มเติมหรือปรับปรุงในอนาคต ผู้ใช้ต้องทราบและยินยอมกับการเปลี่ยนแปลงนั้น

10. กฎหมายและการแก้ขัด
    10.1 Term of Service นี้ได้รับการจัดทำตามกฎหมายของประเทศที่ Log IT NETWORK มีสถานที่ตั้ง

11. อัปเดตล่าสุด
    11.1 Term of Service นี้มีผลบังคับตั้งแต่วันที่ [1/มกราคม/2567]
`;

  Swal.fire({
    icon: 'info',
    title: 'Copyright Notice',
    html: copyrightText,
    confirmButtonText: 'OK'
  });
}

</script>