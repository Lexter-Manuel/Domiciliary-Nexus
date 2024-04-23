<?php
if (file_exists('includes/database.php')) {
  include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
  include_once('../includes/database.php');
}

if (file_exists('includes/addResident.php')) {
  include_once('includes/addResident.php');
}
if (file_exists('../includes/addResident.php')) {
  include_once('../includes/addResident.php');
}

if (file_exists('includes/editArchiveResident.php')) {
  include_once('includes/editArchiveResident.php');
}
if (file_exists('../includes/editArchiveResident.php')) {
  include_once('../includes/editArchiveResident.php');
}

?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Domiciliary Nexus</title>
  <!-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'> -->
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="css/styling.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css
" rel="stylesheet"> -->
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    :root {
      --header-height: 3rem;
      --nav-width: 68px;
      --first-color: var(--darkerblue);
      --first-color-light: #AFA5D9;
      --white-color: #F7F6FB;
      --body-font: 'Nunito', sans-serif;
      --normal-font-size: 1rem;
      --z-fixed: 100
    }

    *,
    ::before,
    ::after {
      box-sizing: border-box
    }

    body {
      position: relative;
      margin: var(--header-height) 0 0 0;
      padding: 0 1rem;
      font-family: var(--body-font);
      font-size: var(--normal-font-size);
      transition: .5s
    }

    a {
      text-decoration: none
    }

    .header {
      width: 100%;
      height: var(--header-height);
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1rem;
      background-color: var(--white-color);
      z-index: var(--z-fixed);
      transition: .5s
    }

    .header_toggle {
      color: var(--first-color);
      font-size: 1.5rem;
      cursor: pointer
    }

    .header_img {
      width: 35px;
      height: 35px;
      display: flex;
      justify-content: center;
      border-radius: 50%;
      overflow: hidden
    }

    .header_img img {
      width: 40px
    }

    .l-navbar {
      position: fixed;
      top: 0;
      left: -30%;
      width: var(--nav-width);
      height: 100vh;
      background-color: var(--first-color);
      padding: .5rem 1rem 0 0;
      transition: .5s;
      z-index: var(--z-fixed)
    }

    .nav {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden
    }

    .nav_logo,
    .nav_link {
      display: grid;
      grid-template-columns: max-content max-content;
      align-items: center;
      column-gap: 1rem;
      padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
      margin-bottom: 2rem
    }

    .nav_logo-icon {
      font-size: 1.25rem;
      color: var(--white-color)
    }

    .nav_logo-name {
      color: var(--white-color);
      font-weight: 700
    }

    .nav_link {
      position: relative;
      color: var(--first-color-light);
      margin-bottom: 1.5rem;
      transition: .3s
    }

    .nav_link:hover {
      color: var(--white-color)
    }

    .nav_icon {
      font-size: 1.25rem
    }

    .reveal {
      left: 0
    }

    .body-pd {
      padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
      color: var(--white-color)
    }

    .active::before {
      content: '';
      position: absolute;
      left: 0;
      width: 2px;
      height: 32px;
      background-color: var(--white-color)
    }

    .height-100 {
      height: 100vh
    }

    @media screen and (min-width: 768px) {
      body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem)
      }

      .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
      }

      .header_img {
        width: 40px;
        height: 40px
      }

      .header_img img {
        width: 45px
      }

      .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0
      }

      .reveal {
        width: calc(var(--nav-width) + 156px)
      }

      .body-pd {
        padding-left: calc(var(--nav-width) + 188px)
      }
    }
  </style>
</head>

<body className='snippet-body'>

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="#" class="nav_logo"> <img src="" alt=""> <span class="nav_logo-name">Domiciliary Nexus</span> </a>
          <div class="nav_list">
            <a href="javascript:void()" onclick="loadPage('pages/dashboard.php','content')" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
            <a href="javascript:void()" onclick="loadPage('pages/officers.php','content')" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Officers</span> </a>
            <a href="javascript:void()" onclick="loadPage('pages/residents.php','content')" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name"> Reisdents</span> </a>
            <a href="javascript:void()" onclick="loadPage('pages/dashboard.php','content')" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a>
            <a href="javascript:void()" onclick="loadPage('pages/dashboard.php','content')" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>
            <a href="javascript:void()" onclick="loadPage('pages/dashboard.php','content')" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light" id="content">

    </div>
    <!--Container Main end-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script type='text/javascript' src='script/modal.js'></script> -->
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js
"></script> -->

    <script>
      function loadPage(url, elementId) {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(elementId).innerHTML = "";
            document.getElementById(elementId).innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
      }
    </script>

    <script type='text/javascript'>
      document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

          // Validate that all variables exist
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
              // reveal navbar
              nav.classList.toggle('reveal')
              // change icon
              toggle.classList.toggle('bx-x')
              // add padding to body
              bodypd.classList.toggle('body-pd')
              // add padding to header
              headerpd.classList.toggle('body-pd')
            })
          }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
          if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
          }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
      });
    </script>
    <script type='text/javascript'>
      var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener('click', function(e) {
        e.preventDefault();
      });
    </script>

    <!-- <script>
      // Bind the click event of the "Edit" button
      $(document).on("click", ".edit_resident", function() {
        // Get the resident ID from the data attribute
        var resident_id = $(this).data("resident_id");

        // AJAX request to edit the resident
        $.ajax({
          url: 'includes/editArchiveResident.php', // Adjust the URL as needed
          type: 'POST',
          data: {
            action: 'edit_resident',
            resident_id: resident_id
          },
          success: function(response) {
            // Handle success response
            var data = JSON.parse(response);
            if (data.success) {
              // Show success message
              alert(data.message);
              // Optionally, reload the page or update the resident table
              location.reload();
            } else {
              // Show error message
              alert(data.message);
            }
          },
          error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
          }
        });
      });
    </script> -->

    <!-- <script>
      $(document).on('click', '.edit-resident', function() {
        var resident_id = $(this).attr('id').split('-')[2]; // Extract resident ID from button ID
        $.ajax({
          url: 'fetch_resident_details.php', // PHP script to fetch resident data
          method: 'POST', // Changed to POST
          data: {
            resident_id: resident_id
          },
          dataType: 'json',
          success: function(response) {
            // Populate form fields with resident data
            $('#resident-edit-modal #resident_id').val(resident_id);
            $('#resident-edit-modal #fname').val(response.fname);
            $('#resident-edit-modal #mname').val(response.mname);
            $('#resident-edit-modal #lname').val(response.lname);
            // Populate other fields similarly
            $('#resident-edit-modal').modal('show'); // Show the modal
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      });
    </script> -->
    <script>
      document.addEventListener('click', function(event) {
        // Check if the clicked element has the class 'edit-resident'
        if (event.target.classList.contains('edit-resident')) {
          // Get the row containing resident information
          var row = event.target.closest('tr');

          // Extract resident information from the row
          var resident_id = event.target.id.split('-').pop();
          var fname = row.cells[1].textContent;
          var mname = row.cells[2].textContent;
          var lname = row.cells[3].textContent;
          var sex = row.cells[4].textContent;
          var bday = row.cells[5].textContent;
          var educ = row.cells[7].textContent;
          var occupation = row.cells[8].textContent;
          var citizenship = row.cells[9].textContent;
          var religion = row.cells[10].textContent;
          var contact_no = row.cells[11].textContent;
          var civil_status = row.cells[12].textContent;
          var house_no = row.cells[13].textContent;
          var street = row.cells[14].textContent;

          // Populate form fields with resident information
          document.getElementById('resident_id').value = resident_id;
          document.getElementById('fname').value = fname;
          document.getElementById('mname').value = mname;
          document.getElementById('lname').value = lname;
          var sexRadio = document.querySelector('input[name="sex"][value="' + sex + '"]');
          if (sexRadio) {
            sexRadio.checked = true;
          }
          document.getElementById('bday').value = bday;
          document.getElementById('educ').value = educ;
          document.getElementById('occupation').value = occupation;
          document.getElementById('citizenship').value = citizenship;
          document.getElementById('religion').value = religion;
          document.getElementById('contact_no').value = contact_no;
          document.getElementById('civil_status').value = civil_status;
          document.getElementById('house_no').value = house_no;
          document.getElementById('street').value = street;


        }
      });
    </script>
  </body>

</html>