const benefit_period = document.getElementById('benefit_period')
const group_benefit = document.getElementById('group_benefit')

const benefit_value = group_benefit.querySelector('#benefit_value')
const benefit_type = group_benefit.querySelector('#benefit_type')

handleCondition(benefitPeriodValue)
benefit_period.addEventListener('change',function(){
     handleCondition(this.value)
})


function handleCondition(period){
     if(period==='lifetime'){
          group_benefit.classList.add('d-none')
          benefit_value.removeAttribute('required')
          benefit_type.removeAttribute('required')
     }else{
          group_benefit.classList.remove('d-none')
          benefit_value.setAttribute('required',true)
          benefit_type.setAttribute('required',true)
     }
}