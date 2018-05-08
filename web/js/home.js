$(document).ready(function() {
  setInterval(timestamp, 1000);
});

function timestamp() {
  $.ajax({
    url: 'php/timestamp.php',
    success: function(data) {
        $('#timestamp').html(data);
      },
    });
  }

  function myFunction() {
      document.getElementById("myDropdown1").classList.toggle("show");
  }
