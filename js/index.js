// let x=prompt("nhập điểm: ");//x: string
// let diem=parseInt(x);// diem : number
//         if (diem<5) 
//         {
//             alert("trượt");
//         } 
//         else if (diem<7) 
//         {
//             alert("tb");  
//         }
//         else if (diem<9) 
//         {
//             alert("khá");
//         }

//         else 
//         {
//             alert("giỏi");
//         }

// let x;
// while (isNaN(x)==true)
//   {  
//       x=prompt("moi bạn nhập số");    
//       if (isNaN(x)==true)   
//       {
//         alert("moi ban nhap lai");
//       } 

//   }
//         let a=parseFloat(x);
//         let canBac2=Math.pow(x,2);
//         let binhPhuong=Math.sqrt(x);
//         let lamTronSo=Math.round(x);

//         alert("can bậc 2: "+ canBac2);
//         alert("binh Phuong: "+ binhPhuong);
//         alert("làm tròn số: "+lamTronSo);
// for (let index = 0; index < array.length; index++) 
// {
//   const element = array[index];

// }
// alert("1.in ra Hello Wold");
// alert("2.in ra Hello FPoLy");
// alert("3.in ra Hello WE17304");
// let x=prompt("Mời bạn chọn: ");
// let diem=parseInt(x);
//     switch (diem) 
//     {
//       case 1:
//         alert(" Hello Wold");
//         break;  
//       case 2:
//         alert("Hello FPoLy");           
//         break;  
//       case 3:
//         alert("Hello WE17304");                 
//         break;  
//       default:
//         alert('Mời bạn nhập lại');
//         break;
//     }
// let so1 = prompt("Mời bạn nhập số đầu: ");
// let x = parseInt(so1);
// let so2 = prompt("Mời bạn nhập số hai: ");
// let y = parseInt(so2);
// let z = prompt("Mời bạn chọn chức năng: ");
// let diem = parseInt(z);
// switch (diem) {
//   case 1:
//     alert(x + y);
//     break;
//   case 3:
//     alert(x * y);
//     break;
//   case 2:
//     alert(x - y);
//     break;
//   case 4:
//     alert(x / y);
//     break;
//   case 5:
//     for (let i = x; i < y; i++) {
//       if (i % 2 == 0) {
//         alert(i)
//       }
//     }
//     break
//   case 6:
//     let binhPhuong = Math.sqrt(x + y);
//     alert(binhPhuong);
//     break;
//   default:
//     alert("không tồn tại")
//     break;
// }
// buổi 3
// let chuoiGoc=("xin chào", "xin chào");
// let chuoiTimkiem="xin";
// while (true) 
// {
//   let kt =(chuoiGoc.match(chuoiTimkiem) || []).length;
//   alert(kt);
//   if (kt==true) 
//   {
//     break;
//   }
//   let tt="fpoly".replace(chuoiGoc);
//   alert(tt);
// }
// buổi 4: demo_forech.js
// let a = [
//   "nhập môn lập trình",
//   "lập trình c#1",
//   "lập trình java 1",
//   "lập trình cơ sở với js",
//   "cơ sở dữ liệu",
// ];
// for (let i = 0; i < a.length; i++) {
//   alert(i+1 + "-" + a[i]);

// }
// function tinhTong(x, y) {
//   return parseInt(x) + parseInt(y);
// }
// function tinhHieu(x, y) {
//   return parseInt(x) - parseInt(y);
// } function tinhTich(x, y) {
//   return parseInt(x) * parseInt(y);
// } function tinhThuong(x, y) {
//   if (b != 0) {
//     return parseInt(x) / parseInt(y);
//   }
// }
// let x = prompt("Mời bạn chọn: ");
// let diem = parseInt(x);
// switch (diem) {
//   case 1:
//     alert(tinhTong(x, y));
//     break;
//   case 3:
//     alert(tinhTich(x, y));
//     break;
//   case 2:
//     alert(tinhHieu(x, y));
//     break;
//   case 4:
//     alert(tinhThuong(x, y));
//     break;
// }
// buổi 5

// function giaiPTBac2() {
//   let so1 = prompt("Mời bạn nhập a: "), so2 = prompt("Mời bạn nhập b: "), so3 = prompt("Mời bạn nhập c");
//   let a = parseInt(so1), b = parseInt(so2), c = parseInt(so3);
//   let delta = b * b - a * c * 4;
//   if (delta == 0) {
//     let x = -b / (2 * a);
//     alert("pt có nghiệm kép: " + x);
//   }
//   else if (delta < 0) {
//     alert("Vô nghiệm:")
//   }
//   else {
//     let x1 = ((-b) + Math.sqrt(delta)) / (2 * a);
//     alert("nghiệm 1: " + x1);
//     let x2 = ((-b) - Math.sqrt(delta)) / (2 * a);
//     alert("nghiệm 2: " + x2);
//   }
// }
// let ptb2 = {
// a:1,
// b:2,c:3,
// }
// function tinhPTB2() {
//   ptb2.a=prompt("Mời bạn nhập a:");
//   ptb2.b=prompt("Mời bạn nhập b:");
//   ptb2.c=prompt("Mời bạn nhập c:");
//   let delta = ptb2.b * ptb2.b - ptb2.a * ptb2.c * 4;
//   if (delta == 0) {
//     let x = -ptb2.b / (2 * ptb2.a);
//     alert("pt có nghiệm kép: " + x);
//   }
//   else if (delta < 0) {
//     alert("Vô nghiệm:");
//   }
//   else {
//     let x1 = ((-ptb2.b) + Math.sqrt(delta)) / (2 * ptb2.a);
//     alert("nghiệm 1: " + x1);
//     let x2 = ((-ptb2.b) - Math.sqrt(delta)) / (2 * ptb2.a);
//     alert("nghiệm 2: " + x2);
//   }
// }