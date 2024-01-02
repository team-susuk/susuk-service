const inputFile = document.querySelector('.text_file #file')
const inputGambar = document.querySelector('.text_gambar #file_gambar')
const type = document.getElementById('type')
const description = document.getElementById('description')


type.addEventListener('change', function () {
     typeNotifListener()
})
const typeNotifListener = () => {
     document.querySelector('.text_file').classList.add('d-none')
     document.querySelector('.text_gambar').classList.add('d-none')
     inputFile.removeAttribute('required')
     inputGambar.removeAttribute('required')

     if (type.value === 'text_image') {
          document.querySelector('.text_gambar').classList.remove('d-none')
          inputGambar.setAttribute('required',true)
     } else if (type.value === 'text_file') {
          document.querySelector('.text_file').classList.remove('d-none')
          inputFile.setAttribute('required',true)
     }
}

description.addEventListener('keypress',function(event){
     const value = this.value
     if(value.length>=1000){
          event.preventDefault()
          return;
     }
     document.getElementById('length-description').innerHTML = value.length + 1
})