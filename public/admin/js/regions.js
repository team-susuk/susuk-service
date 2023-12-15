const baseAdminUrl = document.querySelector('meta[name="admin-base-url"]').getAttribute('content')
const province = document.getElementById('province_id')
const city = document.getElementById('city_id')
const subdistrict = document.getElementById('subdistrict_id')


province.addEventListener('change', function () {
     const provinceId = this.value
     loadCity(provinceId)
})

listenerSelectedValue()

function cityChangeListener() {
     city.addEventListener('change', function () {
          const cityId = this.value
          loadDistrict(cityId)
     })
}

function loadCity(provinceId) {
     if (provinceId) {
          fetch(`${baseAdminUrl}/region/city/${provinceId}`, {
               method: "GET"
          }).then(async (res) => {
               if (res.ok) {
                    const cities = await res.json()
                    loadCityOption(cities)
                    cityChangeListener()
               }
          });
     }
}

function loadDistrict(cityId) {
     clearDistrictOption()
     if (cityId) {
          fetch(`${baseAdminUrl}/region/sub-district/${cityId}`, {
               method: "GET"
          }).then(async (res) => {
               if (res.ok) {
                    const districts = await res.json()
                    loadDistrictOption(districts)
               }
          });
     }
}

function loadCityOption(cities = []) {
     city.innerHTML = '';
     window['select_city_id'].clear();
     window['select_city_id'].clearOptions();
     let options = '<option value="">Pilih Kabupaten/kotamadya</option>'
     for (row of cities) {
          options += `<option ${(citySelected && citySelected == row.id) ? 'selected' : ''} value="${row.id}">${row.name}</option>`
     }
     city.innerHTML = options
     window['select_city_id'].sync()
}

function clearDistrictOption() {
     subdistrict.innerHTML = '';
     window['select_subdistrict_id'].clear();
     window['select_subdistrict_id'].clearOptions();
}

function loadDistrictOption(districts = []) {
     clearDistrictOption()
     let options = '<option value="">Pilih Kecamatan</option>'
     for (row of districts) {
          options += `<option ${(subdistrictSelected && subdistrictSelected == row.id) ? 'selected' : ''} value="${row.id}">${row.name}</option>`
     }
     subdistrict.innerHTML = options
     window['select_subdistrict_id'].sync()
}


function listenerSelectedValue() {
     setTimeout(() => {
          if (provinceSelected) {
               loadCity(provinceSelected)
          }
          if (citySelected) {
               loadDistrict(citySelected)
          }
     }, 500)
}