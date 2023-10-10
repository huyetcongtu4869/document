﻿-- FINAL ASSIGNMENT COM2012 DUNGNA29 BLOCK 2 SP22 --
/*
Câu 1: Luyện tập các câu truy vấn cơ bản:
- a1: Lấy ra danh sách các nhân viên Nữ làm tại cửa hàng hiển thị các cột như sau và sắp xếp ASC theo Tên Nhân Viên:
[ Mã ][ Họ và Tên ][ Giới Tính ][ Ngày Sinh ][ Tuổi ][ Địa Chỉ ][ SĐT ][ Tên Chức Vụ ]
*/
select *from chucvu
SELECT NhanVien.MA,NhanVien.Ho +NhanVien.Ten AS N'Họ và tên',NhanVien.GioiTinh,NhanVien.NgaySinh,DATEDIFF(YEAR,NhanVien.NgaySinh,GETDATE()) AS N'Tuổi',NhanVien.DiaChi,NhanVien.Sdt, ChucVu.Ten AS'Tên Chức Vụ' FROM ChucVu 
JOIN NhanVien ON ChucVu.Id=NhanVien.IdCV
WHERE GioiTinh=N'Nữ'
/*- a2: Lấy ra danh sách các nhân viên làm tại cửa hàng có mã CH1 và sắp xếp giảm dần theo Tên nhân viên:
[ Mã ][ Họ và Tên ][ Giới Tính ][ Ngày Sinh ][ Tuổi ][ Địa Chỉ ][ SĐT ][ Tên Chức Vụ ][ Tên Cửa Hàng ][ Thành Phố ]*/
SELECT NhanVien.MA,NhanVien.Ho +NhanVien.Ten AS N'Họ và tên',NhanVien.GioiTinh,NhanVien.NgaySinh,DATEDIFF(YEAR,NhanVien.NgaySinh,GETDATE()) AS N'Tuổi',NhanVien.DiaChi,NhanVien.Sdt,ChucVu.Ten AS'Tên Chức Vụ',CuaHang.ten,CuaHang.ThanhPho FROM NhanVien
JOIN CuaHang ON CuaHang.id=NhanVien.IdCH 
JOIN ChucVu ON ChucVu.Id=NhanVien.IdCV
/*- a3: Lấy ra các sản phẩm có trong cửa hàng để báo cáo cho trưởng cửa hàng và sắp xếp giảm dần theo giá sản phẩm:
[ Mã SP ][ Tên SP ][ Mã DSP ][ Tên DSP ][ Mầu Sắc ][ Tên NSX ][ Năm bảo hành ][ Số lượng Tồn ] [Giá Nhập][Giá Bán]*/
SELECT ChiTietSP.NamBH,ChiTietSP.SoLuongTon,ChiTietSP.GiaNhap,ChiTietSP.GiaBan,SanPham.Ma,SanPham.Ten,DongSP.Ma,DongSP.Ten,MauSac.Ten,NSX.Ten FROM ChiTietSP 
JOIN SanPham ON SanPham.Id=ChiTietSP.IdSP
JOIN DongSP ON DongSP.Id=ChiTietSP.IdDongSP
JOIN NSX ON NSX.Id=ChiTietSP.IdNsx
JOIN MauSac ON MauSac.Id=ChiTietSP.IdMauSac
/*Câu 2: Giám đốc cơ sở yêu cầu lấy các thông tin sau để báo cáo doanh thu trên các hóa đơn tại cửa hàng hiển thị dữ liệu tổng tiền hóa đơn giảm dần:
[ Mã Hóa Đơn ][ Mã Nhân Viên ][ Tên Nhân Viên ][ Mã Khách Hàng ][ Tên Khách Hàng ][ Ngày Tạo HĐ ][ Ngày Ship ][ Ngày Nhận ][Số ngày Ship Hàng][Tổng Tiền Hóa Đơn]*/
SELECT* FROM HoaDon
SELECT* FROM NhanVien
SELECT* FROM KhachHang
SELECT* FROM HoaDonChiTiet
SELECT* FROM CuaHang
SELECT HoaDon.Ma,NhanVien.Ma,NhanVien.Ten,KhachHang.Ma,KhachHang.Ten,HoaDon.NgayTao,HoaDon.NgayShip,HoaDon.NgayNhan,SUM(SoLuong*DonGia) AS N'Tổng Tiền' FROM HoaDon
JOIN HoaDonChiTiet ON HoaDon.id=HoaDonChiTiet.IdChiTietSP
JOIN NhanVien ON NhanVien.Id=HoaDon.IdNV
JOIN KhachHang On HoaDon.IdKH=KhachHang.Id 
SELECT SUM(SoLuong*DonGia) AS N'Tổng Tiền' FROM HoaDonChiTiet
GROUP BY IdHoaDon

/*Câu 3: Hãy in ra một báo cáo doanh thu các sản phẩm đã bán trên cửa hàng dựa trên các cột sau và sắp xếp giảm dần theo tổng tiền hàng đã bán ra trên từng sản phẩm:
[ Mã SP ][ Tên SP ][ Mã DSP ][ Tên DSP ][ Mầu Sắc ][ Tên NSX ][ Năm bảo hành ][Tổng Tiền Sản Phẩm Đã Bán]*/
SELECT SanPham.Ma,SanPham.Ten,DongSP.ma,DongSP.Ten,MauSac.ten,NSX.Ten,ChiTietSP.NamBH FROM ChiTietSP
JOIN SanPham ON SanPham.Id=ChiTietSP.IdSP
JOIN DongSP ON DongSP.Id=ChiTietSP.IdDongSP
JOIN MauSac ON MauSac.Id=ChiTietSP.IdMauSac
JOIN NSX ON NSX.Id=ChiTietSP.IdNsx
SELECT ChiTietSP.Id, SUM(SoLuong*DonGia) AS N'Tổng Tiền' FROM ChiTietSP
JOIN HoaDonChiTiet  ON HoaDonChiTiet.IdChiTietSP=ChiTietSP.Id
GROUP BY IdChiTietSP
/*Câu 4: Sắp tới có đợt xét khen thưởng tăng lương cho nhân viên hãy hiển thị doanh số bán hàng tren từng nhân viên và sắp xếp tăng dần theo Tổng Tiền.
[ Mã ][ Họ và Tên ][ Giới Tính] [ SĐT ][ Tên Chức Vụ ][ Tên Cửa Hàng ][Tổng Tiền Hàng Đã Bán]*/
SELECT NhanVien.Ma,Ten,gioitinh, SUM(soluong*DonGia) AS'Tổng Tiền Hàng Đã Bán' FROM(NhanVien JOIN HoaDon ON NhanVien.Id=HoaDon.IdNV)
JOIN HoaDonChiTiet ON HoaDon.Id=HoaDonChiTiet.IdHoaDon
GROUP BY NhanVien.Ma,ho,ten
HAVING SUM(soluong)>=all(SELECT SUM(soluong))
ORDER BY SUM(soluong*DonGia)


/*Câu 5: Sắp tới tri ân những khách hàng mua sắp nhiều tại cửa hàng, Hãy lấy danh sách 4 khách hàng mua từ 2 sản phẩm trở lên để báo cáo giám đốc.
[ Mã Khách Hàng ][ Tên Khách Hàng ][SĐT][Số lượng sản phẩm đã mua][Tổng Tiền Hàng]*/
SELECT KhachHang.Ma,KhachHang.Ten,KhachHang.Sdt FROM KhachHang
/*Yêu cầu: Khi lấy dữ liệu đảm bảo tên các cột dược hiển thị theo đúng yêu cầu đã chỉ định ở trên. Đảm bảo các câu truy vấn chính xác và được tính toán đúng áp dụng được các câu lệnh đã được học.
*/