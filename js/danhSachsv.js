let sv = {
    ho_ten: '',
    ma_SV: '',
    hoc_ky: 2,
    chuyen_nganh: '',
};
function danhSachsv() {
    sv.ho_ten = prompt("Mời bạn nhập tên: ");
    sv.chuyen_nganh = prompt("Mời bạn nhập chuyên ngành: ");
    sv.hoc_ky = prompt("Mời bạn nhập học kỳ: ");
    sv.ma_SV = prompt("mòi bạn nhập MSSV");
    alert(sv.ho_ten);
    alert(sv.chuyen_nganh);
    alert(sv.hoc_ky);
    alert(sv.ma_SV);
}