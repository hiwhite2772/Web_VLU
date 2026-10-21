/* =========================================================
     BÀI TẬP: hoàn thiện 5 hàm còn thiếu (đánh dấu TODO) để
     ứng dụng Quản Lý Sinh Viên chạy đúng như bản demo trên lớp.
     Làm lần lượt từ TODO 1 -> TODO 5, test lại sau mỗi bước
     (nhớ mở lại trang trên trình duyệt để chạy code mới).
     ========================================================= */

// Dữ liệu mẫu ban đầu - KHÔNG cần sửa phần này
let danhSachSV = [
    { mssv: "SV001", hoten: "Nguyễn Văn A", lop: "CNTT01" },
    { mssv: "SV002", hoten: "Trần Thị B", lop: "CNTT02" },
    { mssv: "SV003", hoten: "Lê Văn C", lop: "CNTT01" }
];

// Mã SV đang được sửa. null nghĩa là đang ở chế độ Thêm mới - KHÔNG cần sửa
let dangSuaId = null;

// Tham chiếu DOM - KHÔNG cần sửa phần này
const oMssv = document.getElementById("mssv");
const oHoten = document.getElementById("hoten");
const oLop = document.getElementById("lop");
const oBtnThem = document.getElementById("btnThem");
const oTableBody = document.getElementById("tableBody");

/* =========================================================
   TODO 1: Hàm timViTri(mssv)
   - Dùng vòng lặp for để duyệt qua mảng danhSachSV
   - Nếu danhSachSV[i].mssv === mssv thì return i
   - Nếu duyệt hết mảng mà không tìm thấy thì return -1
   Hàm này sẽ được các hàm khác gọi lại nhiều lần bên dưới.
   ========================================================= */
function timViTri(mssv) {
    // TODO 1: viết code ở đây
    for (let i = 0; i < danhSachSV.length; i++) {
        if (danhSachSV[i].mssv == mssv) {
            return i;
        }
    }
    return -1;
}

/* =========================================================
   TODO 2: Hàm hienThiDanhSach()
   - Tạo 1 biến html = "" để gom chuỗi HTML
   - Dùng vòng lặp for duyệt qua danhSachSV, mỗi sinh viên
     nối thêm 1 đoạn <tr>...</tr> vào biến html (xem cấu trúc
     bảng ở phần HTML phía trên để biết cần mấy cột <td>)
   - Mỗi dòng cần có 2 nút:
       <button class="btn-sua" onclick="suaSinhVien('...')">Sửa</button>
       <button class="btn-xoa" onclick="xoaSinhVien('...')">Xóa</button>
     (thay ... bằng sv.mssv)
   - Cuối cùng gán oTableBody.innerHTML = html
   ========================================================= */
function hienThiDanhSach() {
    // TODO 2: viết code ở đây
    let html = "";
    for (let i = 0; i < danhSachSV.length; i++) {
        let sv = danhSachSV[i];
        html += `
            <tr>
                <td>${sv.mssv}</td>
                <td>${sv.hoten}</td>
                <td>${sv.lop}</td>
                <td>
                    <button class="btn-sua" onclick="suaSinhVien('${sv.mssv}')">Sua</button>
                    <button class="btn-xoa" onclick="xoaSinhVien('${sv.mssv}')">Xoa</button>
                </td>
            </tr>
        `;
    }
    oTableBody.innerHTML = html;

}

/* =========================================================
   TODO 3: Hàm luuSinhVien()
   Được gọi khi bấm nút Thêm/Cập nhật.
   - Đọc giá trị 3 ô input: oMssv.value, oHoten.value, oLop.value
   - Nếu dangSuaId === null (đang THÊM MỚI):
       + tạo object mới { mssv, hoten, lop } và push vào danhSachSV
     Ngược lại (đang CẬP NHẬT):
       + dùng timViTri(dangSuaId) để tìm vị trí
       + gán danhSachSV[viTri] = object mới
       + đặt lại dangSuaId = null
       + đổi chữ trên oBtnThem về lại "Thêm"
   - Xóa trắng 3 ô input (gán = "")
   - Gọi lại hienThiDanhSach() để cập nhật giao diện
   ========================================================= */
function luuSinhVien() {
    // TODO 3: viết code ở đây
    let new_mssv = oMssv.value;
    let new_hoten = oHoten.value;
    let new_lop = oLop.value;

    if (new_mssv == "" || new_hoten == "" || new_lop == "") {
        alert("Vui lòng nhập đầy đủ?")
    }
    else {
        if (dangSuaId == null) {
            let sv = {
                mssv: new_mssv,
                hoten: new_hoten,
                lop: new_lop
            };
            danhSachSV.push(sv);
        } else {
            let viTri = timViTri(dangSuaId);
            if (viTri !== -1) {
                let sv = {
                    mssv: new_mssv,
                    hoten: new_hoten,
                    lop: new_lop
                };
                danhSachSV[viTri] = sv;
            }
            dangSuaId = null;
            oBtnThem.innerText = "Them";
        }
        oMssv.value = "";
        oHoten.value = "";
        oLop.value = "";

        hienThiDanhSach();
    }
}

/* =========================================================
   TODO 4: Hàm xoaSinhVien(mssv)
   - Dùng timViTri(mssv) để tìm vị trí sinh viên trong mảng
   - Dùng danhSachSV.splice(viTri, 1) để xóa 1 phần tử tại
     vị trí đó ra khỏi mảng
   - Gọi lại hienThiDanhSach()
   ========================================================= */
function xoaSinhVien(mssv) {
    // TODO 4: viết code ở đây
    let viTri = timViTri(mssv);
    if (viTri != -1) {
        danhSachSV.splice(viTri, 1);
    }
    hienThiDanhSach();
}

/* =========================================================
   TODO 5: Hàm suaSinhVien(mssv)
   - Dùng timViTri(mssv) để tìm vị trí, lấy ra object sinh viên
   - Đổ 3 giá trị của sinh viên đó vào 3 ô input
   - Gán dangSuaId = mssv
   - Đổi chữ trên oBtnThem thành "Cập nhật"
   ========================================================= */
function suaSinhVien(mssv) {
    // TODO 5: viết code ở đây
    let viTri = timViTri(mssv);
    if (viTri !== -1) {
        let sv = danhSachSV[viTri];
        oMssv.value = sv.mssv;
        oHoten.value = sv.hoten;
        oLop.value = sv.lop;

        dangSuaId = mssv;
        oBtnThem.innerText = "Sua";
    }
}

// Hiển thị danh sách mẫu ngay khi trang vừa tải xong - KHÔNG cần sửa
hienThiDanhSach();