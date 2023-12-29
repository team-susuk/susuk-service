document.querySelectorAll('.time-flatpicker').forEach(function (item) {
     flatpickr(item, {
          enableTime: true,
          noCalendar: true,
          dateFormat: "H:i",
          time_24hr: true
     });
})