// // Initialization for ES Users
// import { Ripple, initMDB } from "mdb-ui-kit";
// initMDB({ Ripple });

// console.log('Halooooooooooooooo');

function gagalLogin() {
    console.log('Username/Password Salah');
}

let isSidebarExtended = false
const iconDashboard = 'Icon'
const iconDataBuku = '<i class="fa fa-book" />'

const textDashboard = 'Dashboard'
const textDataBuku = 'Data Buku'

document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggler = document.getElementById('sidebar-toggler');
    if (sidebarToggler) {
      sidebarToggler.onclick = ((e) => {
        isSidebarExtended = !isSidebarExtended

        if(isSidebarExtended) {
            document.getElementById('sidebar').style.width = '14rem'

            document.getElementById('sidebar__user-information').style.display = 'flex'
            document.getElementById('sidebar--dashboard').innerHTML = textDashboard
            document.getElementById('sidebar--data-buku').innerHTML = textDataBuku
        } else {
            document.getElementById('sidebar').style.width = '6rem'
            document.getElementById('sidebar__user-information').style.display = 'none'
            document.getElementById('sidebar--data-buku').innerHTML = iconDataBuku
            document.getElementById('sidebar--dashboard').innerHTML = iconDashboard
        }
      });
    }
  });
  

// document.getElementById('sidebar-toggler').onclick = ((e) => {
//     isSidebarExtended = !isSidebarExtended

//     if(isSidebarExtended) {
//         document.getElementById('sidebar').style.width = '14rem'

//         document.getElementById('sidebar__user-information').style.display = 'flex'
//         document.getElementById('sidebar--dashboard').innerHTML = textDashboard
//         document.getElementById('sidebar--data-buku').innerHTML = textDataBuku
//     } else {
//         document.getElementById('sidebar').style.width = '6rem'
//         document.getElementById('sidebar__user-information').style.display = 'none'
//         document.getElementById('sidebar--data-buku').innerHTML = iconDataBuku
//         document.getElementById('sidebar--dashboard').innerHTML = iconDashboard
//     }
// })

// data table
// import DataTable from 'datatables.net-dt';
// import 'datatables.net-responsive-dt';
// new DataTable('#myTable');