// document.querySelector('#modal-export-data .form-group:nth-child(2)').remove()
document.querySelectorAll('.nav-item.has-submenu').forEach((item)=>{
     if(item.querySelector('.nav-link.active')){
          item.classList.add('show')
          item.querySelector('.submenu.collapse').classList.add('show')
     }
})