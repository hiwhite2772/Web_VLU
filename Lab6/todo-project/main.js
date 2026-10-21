/* =========================================================
     1. DỮ LIỆU: mảng các object công việc
     Mỗi công việc là 1 object { id, noiDung, hoanThanh }
     id dùng để phân biệt các công việc với nhau (giống mssv
     trong bài Quản Lý Sinh Viên)
     ========================================================= */
let danhSachCV = [
   { id: 1, noiDung: "Học bài JavaScript", hoanThanh: false },
   { id: 2, noiDung: "Làm bài tập về nhà", hoanThanh: true },
   { id: 3, noiDung: "Ôn thi giữa kỳ", hoanThanh: false }
];

// Biến đếm để cấp id mới cho công việc tiếp theo được thêm vào
let idTiepTheo = 4;

/* =========================================================
   2. LẤY THAM CHIẾU CÁC PHẦN TỬ DOM CẦN DÙNG NHIỀU LẦN
   ========================================================= */
let oNoiDung = document.getElementById("noiDung");
let oDanhSach = document.getElementById("danhSach");

/* =========================================================
   3. HÀM TÌM VỊ TRÍ 1 CÔNG VIỆC TRONG MẢNG THEO ID
   Dùng vòng lặp for thông thường, trả về index nếu tìm thấy,
   trả về -1 nếu không có.
   ========================================================= */
function timViTri(id) {
   for (let i = 0; i < danhSachCV.length; i++) {
      if (danhSachCV[i].id === id) {
         return i;
      }
   }
   return -1;
}

/* =========================================================
   4. HÀM VẼ LẠI TOÀN BỘ DANH SÁCH DỰA TRÊN danhSachCV
   Dùng vòng lặp for để nối chuỗi HTML. Mỗi khi dữ liệu thay
   đổi xong đều gọi lại hàm này để giao diện cập nhật theo.
   ========================================================= */
function hienThiDS() {
   let html = "";
   for (let i = 0; i < danhSachCV.length; i++) {
      let cv = danhSachCV[i];
      let state = "";
      if (cv.hoanThanh === true) {
         state = "checked";
      }
      let lopCSS = "noi-dung";
      if (cv.hoanThanh === true) {
         lopCSS = "noi-dung hoan-thanh";
      }
      html += `
            <li>
               <input type="checkbox" ${state} onchange="toggleHoanThanh(${cv.id})">
               <span class="${lopCSS}">
                  ${cv.noiDung}
               </span>
               <button class="btn-xoa" onclick="xoaCongViec(${cv.id})">
                  Xoa
               </button>
            </li>
         `;
   }
   oDanhSach.innerHTML = html;
}

/* =========================================================
   5. HÀM THÊM CÔNG VIỆC MỚI
   ========================================================= */
function themCV() {
   let text_noiDung = oNoiDung.value;
   let cv = {
      id: idTiepTheo,
      noiDung: text_noiDung,
      hoanThanh: false
   };

   if (text_noiDung == "") {
      alert("Lỗi không hợp lệ! Vui lòng nhập lại?");
   }

   else {
      danhSachCV.push(cv);
      idTiepTheo++;
      oNoiDung.value = "";
      hienThiDS();
   }

}

/* =========================================================
   6. HÀM XÓA 1 CÔNG VIỆC THEO ID
   ========================================================= */
function xoaCongViec(id) {
   let viTri = timViTri(id);
   if (viTri !== -1) {
      danhSachCV.splice(viTri, 1);
      hienThiDS();
   }

}
/* =========================================================
   7. HÀM ĐÁNH DẤU HOÀN THÀNH / BỎ ĐÁNH DẤU
   Đảo ngược giá trị true/false của thuộc tính hoanThanh
   ========================================================= */
function toggleHoanThanh(id) {
   let viTri = timViTri(id);
   if (viTri !== -1) {
      danhSachCV[viTri].hoanThanh = !danhSachCV[viTri].hoanThanh;
      hienThiDS();
   }

}

/* =========================================================
   8. HIỂN THỊ DANH SÁCH LẦN ĐẦU KHI TẢI TRANG
   ========================================================= */
hienThiDS();